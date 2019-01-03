<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:12
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Faizalami\LaravelMager\Components\JsonIOControllerTrait;
use Illuminate\Http\Request;

class PagesManagerController extends Controller
{
    use JsonIOControllerTrait;

    public function index() {
        $pages = $this->loadJson('configs/pages.json');

        $controllers = [];
        foreach ($pages as $page) {
            $controller = $this->loadJson('pages/' . $page . '/controller/' . $page . '.json');
            array_push($controllers, $controller);
        }

        return view('mager::pages.pages-manager.index', compact('controllers'));
    }

    public function createController(Request $request) {
        if ($request->isMethod('get')) {
            return view('mager::pages.pages-manager.create-controller');
        } elseif ($request->isMethod('post')) {
            $configController = $this->loadJson('templates/controller.json');
            $configPage = $this->loadJson('configs/pages.json');
            $configModel = $this->loadJson('templates/model.json');

            foreach ($request->all() as $key => $req) {
                $configController->{$key} = $req;

                if($key == 'web' || $key == 'rest') {
                    if($req === 'true') {
                        $configController->{$key} = true;
                    }
                }
            }

            $configModel->name = $configController->model;
            $configModel->table = lcfirst($configController->model);

            array_push($configPage, $configController->url);

            $this->saveJson($configController, 'pages/' . $configController->url . '/controller/' . $configController->url . '.json');
            $this->saveJson($configModel, 'pages/' . $configController->url . '/model/' . $configModel->name . '.json');
            $this->saveJson($configPage, 'configs/pages.json');

            return response()->redirectToRoute('mager.pages.index');
        }
    }

    public function createPage(Request $request, $controller) {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');
        if ($request->isMethod('get')) {
            return view('mager::pages.pages-manager.create-page', compact('configController'));
        } elseif ($request->isMethod('post')) {
            $configControllerPage = $this->loadJson('templates/controllerPage.json');
            $configView = $this->loadJson('templates/view.json');

            foreach ($request->all() as $key => $req) {
                $configControllerPage->{$key} = $req;
            }

            if(in_array($configControllerPage->resource, ['show', 'edit', 'destroy'])) {
                $configControllerPage->params = ['id'];
            }

            $pageId = preg_replace("/[^a-zA-Z]+/", "", lcfirst(implode('', explode(' ', $configControllerPage->title))));

            $configController->pages->{$pageId} = $configControllerPage;

            $configView->controller = $configController->url;
            $configView->model = $configController->model;
            $configView->name = $configControllerPage->view;

            $this->saveJson($configController, 'pages/' . $configController->url . '/controller/' . $configController->url . '.json');
            $this->saveJson($configView, 'pages/' . $configController->url . '/view/' . $configControllerPage->view . '.json');

            return response()->redirectToRoute('mager.pages.index');
        }
    }

    public function showController($controller) {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');

        return view('mager::pages.pages-manager.show-controller', compact('configController'));
    }

    public function showPage($controller, $page) {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');
        $configControllerPage = $configController->pages->{$page};

        return view('mager::pages.pages-manager.show-page', compact('configController', 'configControllerPage'));
    }
}
