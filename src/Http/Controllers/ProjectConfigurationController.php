<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:14
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Faizalami\LaravelMager\Components\JsonIOControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ProjectConfigurationController extends Controller
{
    use JsonIOControllerTrait;

    public function theme(Request $request) {
        $configTheme = $this->loadJson('configs/main.json');

        if ($request->isMethod('get')) {
            return view('mager::pages.project-configuration.theme', compact('configTheme'));
        } elseif ($request->isMethod('post')) {
            $this->saveJson($request->all(), 'configs/main.json');
            return response()->redirectToRoute('mager.configuration.theme');
        }
    }

    public function uploadLogo(Request $request) {
        $logo = $request->file('file');

        Artisan::call('storage:link');

        $filename = 'logo-' . date('Y-m-d-H-i-s') . '.'.$request->file('file')->extension();

        $logo->storeAs('public/images/logo', $filename);

        return [
            'name' => 'storage/images/logo/' . $filename
        ];
    }

    public function navbar() {
        $configNavbar = (array) $this->loadJson('configs/navbar.json');
        return view('mager::pages.project-configuration.navbar', compact('configNavbar'));
    }

    public function sidebar() {
        $configSidebar = (array) $this->loadJson('configs/sidebar.json');
        return view('mager::pages.project-configuration.sidebar', compact('configSidebar'));
    }

    public function createNavbar(Request $request) {
        if ($request->isMethod('get')) {
            return view('mager::pages.project-configuration.form-menu');
        } elseif ($request->isMethod('post')) {
            $this->saveConfig($request->all(), 'navbar');
            return response()->redirectToRoute('mager.configuration.navbar');
        }
    }

    public function createSidebar(Request $request) {
        if ($request->isMethod('get')) {
            return view('mager::pages.project-configuration.form-menu');
        } elseif ($request->isMethod('post')) {
            $this->saveConfig($request->all(), 'sidebar');
            return response()->redirectToRoute('mager.configuration.sidebar');
        }
    }

    public function editNavbar(Request $request, $id) {
        if ($request->isMethod('get')) {
            $configMenu = $this->loadJson('configs/navbar.json')->{$id};
            return view('mager::pages.project-configuration.form-menu', compact('configMenu'));
        } elseif ($request->isMethod('post')) {
            $this->deleteConfig($id, 'navbar');
            $this->saveConfig($request->all(), 'navbar');
            return response()->redirectToRoute('mager.configuration.navbar');
        }
    }

    public function editSidebar(Request $request, $id) {
        if ($request->isMethod('get')) {
            $configMenu = $this->loadJson('configs/sidebar.json')->{$id};
            return view('mager::pages.project-configuration.form-menu', compact('configMenu'));
        } elseif ($request->isMethod('post')) {
            $this->deleteConfig($id, 'sidebar');
            $this->saveConfig($request->all(), 'sidebar');
            return response()->redirectToRoute('mager.configuration.sidebar');
        }
    }

    public function deleteNavbar($id) {
        $this->deleteConfig($id, 'navbar');
        return response()->redirectToRoute('mager.configuration.navbar');
    }

    public function deleteSidebar($id) {
        $this->deleteConfig($id, 'sidebar');
        return response()->redirectToRoute('mager.configuration.sidebar');
    }

    private function saveConfig($request, $type) {
        $configMenu = $this->loadJson('configs/'.$type.'.json');
        $baseRoute = explode('/', $request['route'])[0];
        $request['active'] = '';
        $configMenu->{$baseRoute} = $request;

        $this->saveJson($configMenu, 'configs/'.$type.'.json');
    }

    private function deleteConfig($id, $type) {
        $configMenu = $this->loadJson('configs/'.$type.'.json');
        unset($configMenu->{$id});

        $this->saveJson($configMenu, 'configs/'.$type.'.json');
    }
}
