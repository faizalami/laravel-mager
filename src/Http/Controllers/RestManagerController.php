<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:16
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Faizalami\LaravelMager\Components\Generators\RestConfigGenerator;
use Faizalami\LaravelMager\Components\JsonIOControllerTrait;
use Illuminate\Http\Request;

class RestManagerController extends Controller
{
    use JsonIOControllerTrait;

    public function index()
    {
        $pages = $this->loadJson('configs/pages.json');

        $controllers = [];
        foreach ($pages as $page) {
            $controller = $this->loadJson('pages/' . $page . '/controller/' . $page . '.json');
            if ($controller->rest) {
                array_push($controllers, $controller);
            }
        }

        return view('mager::pages.rest-manager.index', compact('controllers'));
    }

    public function format(Request $request)
    {
        $configRest = $this->loadJson('configs/restFormat.json');
        if ($request->isMethod('get')) {
            return view('mager::pages.rest-manager.format', compact('configRest'));
        } elseif ($request->isMethod('post')) {
            $data = $request->all();

            $configRest = [];
            if (isset($data['wrap'])) {
                $configRest = [
                    'wrap' => true,
                    'status' => isset($data['status']),
                    'message' => isset($data['message']),
                    'length' => isset($data['length']),
                ];
            } else {
                $configRest['wrap'] = false;
            }

            $this->saveJson($configRest, 'configs/restFormat.json');

            $restConfigGenerator = new RestConfigGenerator($configRest);
            $restConfigGenerator->render()->generate();

            return response()->redirectToRoute('mager.rest.format');
        }
    }

    public function showController($controller)
    {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');

        foreach ($configController->pages as $name => $page) {
            if (!$page->rest) {
                unset($configController->pages->{$name});
            }
        }

        return view('mager::pages.rest-manager.show-controller', compact('configController'));
    }

    public function editDesc(Request $request, $controller, $page = null)
    {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');

        if ($request->isMethod('get')) {
            if ($page == null) {
                $config = $configController;
                $config->isPage = false;
                return view('mager::pages.rest-manager.edit-rest-desc', compact('config'));
            } else {
                $config = $configController->pages->{$page};
                $config->name = $page;
                $config->isPage = true;
                $config->controller = $controller;
                return view('mager::pages.rest-manager.edit-rest-desc', compact('config'));
            }
        } elseif ($request->isMethod('post')) {
            $restDesc = $request->all()['restDesc'];
            if ($page == null) {
                $configController->restDesc = $restDesc;
                $this->saveJson($configController, 'pages/' . $controller . '/controller/' . $controller . '.json');
                return response()->redirectToRoute('mager.rest.index');
            } else {
                $configController->pages->{$page}->restDesc = $restDesc;
                $this->saveJson($configController, 'pages/' . $controller . '/controller/' . $controller . '.json');
                return response()->redirectToRoute('mager.rest.show.controller', ['controller' => $controller]);
            }
        }
    }
}
