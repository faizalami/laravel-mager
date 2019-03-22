<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:16
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Faizalami\LaravelMager\Components\JsonIOControllerTrait;
use Illuminate\Http\Request;

class DatabaseManagerController extends Controller
{
    use JsonIOControllerTrait;

    private $generatedColumns;
    private $notGeneratedColumns;
    private $deletedColumns;
    private $configPage;
    private $configModel;

    public function index() {
        $pageNames = $this->loadJson('configs/pages.json');
        $models = [];
        foreach ($pageNames as $pageName) {
            $configPage = $this->loadJson('pages/'.$pageName.'/'.$pageName.'.json');
            $configModel = $this->loadJson('pages/'.$pageName.'/model/'.$configPage->modelConfig.'.json');

            array_push($models, $configModel);
        }

        return view('mager::pages.database-manager.index', compact('models'));
    }

    private function initModel($controller) {
        $this->generatedColumns = [];
        $this->configPage = $this->loadJson('pages/'.$controller.'/'.$controller.'.json');
        $this->configModel = $this->loadJson('pages/'.$controller.'/model/'.$this->configPage->modelConfig.'.json');

        if($this->configModel->generatedAt != null) {
            $generatedAt = \DateTime::createFromFormat('Y_m_d_His', $this->configModel->generatedAt);
            foreach (array_reverse($this->configModel->history) as $history) {
                $modelTime = \DateTime::createFromFormat('Y_m_d_His', $history->time);

                if ($generatedAt >= $modelTime) {
                    $this->generatedColumns = $history->table;
                    break;
                }
            }
        }

        $generatedColumns = array_keys((array) $this->generatedColumns);
        $newestColumns = array_keys((array) $this->configModel->columns);

        $this->deletedColumns = array_diff($generatedColumns, $newestColumns);
        $this->notGeneratedColumns = [];
        foreach(array_diff($newestColumns, $generatedColumns) as $column) {
            $this->notGeneratedColumns[$column] = $this->configModel->columns->{$column};
        }
    }

    public function tableProperties($controller) {
        $this->initModel($controller);
        $generatedColumns = $this->generatedColumns;
        $notGeneratedColumns = $this->notGeneratedColumns;
        $deletedColumns = $this->deletedColumns;
        $configModel = $this->configModel;

        return view('mager::pages.database-manager.table-properties', compact('generatedColumns', 'notGeneratedColumns', 'deletedColumns', 'configModel'));
    }

    public function tableData($controller) {
        $this->initModel($controller);
        $columns = $this->generatedColumns;
        $configPage = $this->configPage;
        $configModel = $this->configModel;

        $model = '\\App\\Models\\'.$configPage->modelConfig;
        $data = $model::all();
        return view('mager::pages.database-manager.table-data', compact('columns', 'data', 'configModel'));
    }

    public function createColumn(Request $request, $controller) {
        $this->initModel($controller);
        $columns = $this->generatedColumns;
        $configModel = $this->configModel;
        $configComponent = $this->loadJson('templates/component.json');
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-create-column', compact('columns', 'configModel'));
        } elseif ($request->isMethod('post')) {
            $columns = $request->all()['columns'];
            foreach ($columns as $key => $column) {
                if($column['name'] != null) {
                    $configModel->columns->{$column['name']} = $configComponent->{$column['input']}->db;
                    $configModel->columns->{$column['name']}->label = $column['label'];
                    $configModel->columns->{$column['name']}->input = $column['input'];
                }
            }
            $configModel->history[] = [
                'time' => date('Y_m_d_His'),
                'table' => $configModel->columns
            ];

            $this->saveJson($configModel, 'pages/'.$controller.'/model/'.$this->configPage->modelConfig.'.json');

            return response()->redirectToRoute('mager.database.table.properties', ['controller' => $controller]);
        }
    }

    public function editColumn(Request $request, $controller, $column) {
        $this->initModel($controller);
        $configModel = $this->configModel;
        $editColumn = $configModel->columns->{$column};
        $configComponent = $this->loadJson('templates/component.json');
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-edit-column', compact('column','editColumn', 'configModel'));
        } elseif ($request->isMethod('post')) {
            unset($configModel->columns->{$column});

            $editedColumn = $request->all();
            if($editedColumn['name'] != null) {
                $configModel->columns->{$editedColumn['name']} = $configComponent->{$editedColumn['input']}->db;
                $configModel->columns->{$editedColumn['name']}->label = $editedColumn['label'];
                $configModel->columns->{$editedColumn['name']}->input = $editedColumn['input'];
            }

            $configModel->history[] = [
                'time' => date('Y_m_d_His'),
                'table' => $configModel->columns
            ];

            $this->saveJson($configModel, 'pages/'.$controller.'/model/'.$this->configPage->modelConfig.'.json');

            return response()->redirectToRoute('mager.database.table.properties', ['controller' => $controller]);
        }
    }

    public function createData(Request $request, $controller) {
        $this->initModel($controller);
        $columns = $this->generatedColumns;
        $configModel = $this->configModel;
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-create-data', compact('columns', 'configModel'));
        } elseif ($request->isMethod('post')) {
            $configPage = $this->configPage;
            $model = '\\App\\Models\\'.$configPage->modelConfig;
            $data = $request->all()['data'];

            $model::insert($data);

            return response()->redirectToRoute('mager.database.table.data', ['controller' => $controller]);
        }
    }

    public function editData(Request $request, $controller, $id) {
        $this->initModel($controller);
        $columns = $this->generatedColumns;
        $configModel = $this->configModel;
        $configPage = $this->configPage;
        $model = '\\App\\Models\\'.$configPage->modelConfig;
        $data = $model::find($id);
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-edit-data', compact('columns', 'configModel', 'data'));
        } elseif ($request->isMethod('post')) {
            $data->fill($request->all());
            $data->save();

            return response()->redirectToRoute('mager.database.table.data', ['controller' => $controller]);
        }
    }

    public function deleteData($controller, $id) {
        $this->initModel($controller);
        $configPage = $this->configPage;
        $model = '\\App\\Models\\'.$configPage->modelConfig;
        $data = $model::find($id);
        $data->delete();

        return response()->redirectToRoute('mager.database.table.data', ['controller' => $controller]);
    }

    public function createDummy(Request $request, $controller) {
        $this->initModel($controller);
        $columns = $this->generatedColumns;
        $configModel = $this->configModel;
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-dummy', compact('columns', 'configModel'));
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }

    public function deleteColumn($controller, $column) {
        $this->initModel($controller);
        $configModel = $this->configModel;
        unset($configModel->columns->{$column});

        $configModel->history[] = [
            'time' => date('Y_m_d_His'),
            'table' => $configModel->columns
        ];

        $this->saveJson($configModel, 'pages/'.$controller.'/model/'.$this->configPage->modelConfig.'.json');

        return response()->redirectToRoute('mager.database.table.properties', ['controller' => $controller]);
    }
}
