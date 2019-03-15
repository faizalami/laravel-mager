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

    private $columns;
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
        $this->columns = [];
        $this->configPage = $this->loadJson('pages/'.$controller.'/'.$controller.'.json');
        $this->configModel = $this->loadJson('pages/'.$controller.'/model/'.$this->configPage->modelConfig.'.json');

        if($this->configModel->generatedAt != null) {
            $generatedAt = \DateTime::createFromFormat('Y_m_d_His', $this->configModel->generatedAt);
            foreach (array_reverse($this->configModel->history) as $history) {
                $modelTime = \DateTime::createFromFormat('Y_m_d_His', $history->time);

                if($generatedAt >= $modelTime) {
                    $this->columns = $history->table;
                    break;
                }
            }
        }
    }

    public function tableProperties($controller) {
        $this->initModel($controller);
        $columns = $this->columns;
        $configModel = $this->configModel;

        return view('mager::pages.database-manager.table-properties', compact('columns', 'configModel'));
    }

    public function tableData($controller) {
        $this->initModel($controller);
        $columns = $this->columns;
        $configPage = $this->configPage;
        $configModel = $this->configModel;

        $model = '\\App\\Models\\'.$configPage->modelConfig;
        $data = $model::all();
        return view('mager::pages.database-manager.table-data', compact('columns', 'data', 'configModel'));
    }

    public function createColumn(Request $request, $controller) {
        $this->initModel($controller);
        $columns = $this->columns;
        $configModel = $this->configModel;
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-column', compact('columns', 'configModel'));
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }

    public function createData(Request $request, $controller) {
        $this->initModel($controller);
        $columns = $this->columns;
        $configModel = $this->configModel;
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-data', compact('columns', 'configModel'));
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }

    public function createDummy(Request $request, $table) {
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-dummy');
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }
}
