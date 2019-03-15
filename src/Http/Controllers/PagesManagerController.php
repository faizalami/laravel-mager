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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
            return view('mager::pages.pages-manager.form-controller');
        } elseif ($request->isMethod('post')) {
            $configController = $this->loadJson('templates/controller.json');
            $configPage = $this->loadJson('templates/page.json');
            $configPageList = $this->loadJson('configs/pages.json');
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
            $configModel->controller = $configController->url;

            $configPage->controllerConfig = $configController->url;
            $configPage->modelConfig = $configController->model;

            array_push($configPageList, $configController->url);

            $this->saveJson($configController, 'pages/' . $configController->url . '/controller/' . $configController->url . '.json');
            $this->saveJson($configPage, 'pages/' . $configController->url . '/' . $configController->url . '.json');
            $this->saveJson($configModel, 'pages/' . $configController->url . '/model/' . $configModel->name . '.json');
            $this->saveJson($configPageList, 'configs/pages.json');

            return response()->redirectToRoute('mager.pages.index');
        } else {
            return new NotFoundHttpException();
        }
    }

    public function createPage(Request $request, $controller) {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');
        if ($request->isMethod('get')) {
            return view('mager::pages.pages-manager.form-page', compact('configController'));
        } elseif ($request->isMethod('post')) {
            $configControllerPage = $this->loadJson('templates/controllerPage.json');
            $configPage = $this->loadJson('pages/' . $controller . '/' . $controller . '.json');
            $configView = $this->loadJson('templates/view.json');

            $post = $request->all();
            foreach ($post as $key => $data) {
                if($key != 'landing') {
                    $configControllerPage->{$key} = $data;

                    if($key == 'resource') {
                        switch ($data) {
                            case 'index':
                                $configView->type = 'index';
                                $configControllerPage->methods = [ 'get' ];
                                break;
                            case 'show':
                                $configView->type = 'show';
                                $configControllerPage->methods = [ 'get' ];
                                break;
                            case 'create':
                                $configView->type = 'form';
                                $configControllerPage->methods = [ 'get', 'post' ];
                                break;
                            case 'edit':
                                $configView->type = 'form';
                                $configControllerPage->methods = [ 'get', 'post' ];
                                break;
                            case 'destroy':
                                $configControllerPage->methods = [ 'delete' ];
                                break;
                        }
                    }
                } else {
                    if($data == 'true') {
                        $configController->defaultPage = $post['url'];

                        $configSidebar = $this->loadJson('configs/sidebar.json');
                        $configMenuItem = $this->loadJson('templates/menuItem.json');
                        $configMenuItem->title = $post['title'];
                        $configMenuItem->route = $configController->url.'/'.$post['url'];
                        $configSidebar->{$configController->url} = $configMenuItem;

                        $this->saveJson($configSidebar, 'configs/sidebar.json');
                    }
                }
            }

            if(in_array($configControllerPage->resource, ['show', 'edit', 'destroy'])) {
                $configControllerPage->params = ['id'];
            }

            $pageId = preg_replace("/[^a-zA-Z]+/", "", lcfirst(implode('', explode(' ', $configControllerPage->title))));


            $configController->pages->{$pageId} = $configControllerPage;

            $configView->controller = $configController->url;
            $configView->model = $configController->model;
            $configView->name = $configControllerPage->view;

            array_push($configPage->viewConfig, ['config' => $configControllerPage->view]);

            $this->saveJson($configController, 'pages/' . $configController->url . '/controller/' . $configController->url . '.json');
            $this->saveJson($configPage, 'pages/' . $configController->url . '/' . $configController->url . '.json');
            $this->saveJson($configView, 'pages/' . $configController->url . '/view/' . $configControllerPage->view . '.json');

            return response()->redirectToRoute('mager.pages.index');
        } else {
            throw new NotFoundHttpException();
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

    public function editController(Request $request, $controller) {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');

        if ($request->isMethod('get')) {
            return view('mager::pages.pages-manager.form-controller', compact('configController'));
        } elseif ($request->isMethod('post'))  {
            $this->deleteController($controller);
            return $this->createController($request);
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function editPage(Request $request, $controller, $page) {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');
        $configControllerPage = $configController->pages->{$page};

        if ($request->isMethod('get')) {
            return view('mager::pages.pages-manager.form-page', compact('configController', 'configControllerPage'));
        } elseif ($request->isMethod('post'))  {
            $this->deletePage($controller, $page);
            return $this->createPage($request, $controller);
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function deleteController($controller) {
        $configPages = $this->loadJson('configs/pages.json');

        unset($configPages[array_search($controller, $configPages)]);

        $this->saveJson($configPages, 'configs/pages.json');

        $removeConfig = base_path(config('mager.data').'pages/' . $controller);
        $this->rrmdir($removeConfig);

        return response()->redirectToRoute('mager.pages.index');
    }

    public function deletePage($controller, $page) {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');
        unset($configController->pages->{$page});
        $this->saveJson($configController, 'pages/' . $controller . '/controller/' . $controller . '.json');

        return response()->redirectToRoute('mager.pages.index');
    }

    private function rrmdir($path) {
        if(is_dir($path)) {
            $dir = opendir($path);
            while(false !== ( $file = readdir($dir)) ) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    $fullPath = $path . '/' . $file;
                    if ( is_dir($fullPath) ) {
                        $this->rrmdir($fullPath);
                    }
                    else {
                        unlink($fullPath);
                    }
                }
            }
            closedir($dir);
            return rmdir($path);
        }
        else return false;
    }
}
