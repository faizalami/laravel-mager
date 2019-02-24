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
        return view('mager::pages.project-configuration.navbar');
    }

    public function sidebar() {
        return view('mager::pages.project-configuration.sidebar');
    }

    public function createNavbar(Request $request) {
        if ($request->isMethod('get')) {
            return view('mager::pages.project-configuration.form-menu');
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }

    public function createSidebar(Request $request) {
        if ($request->isMethod('get')) {
            return view('mager::pages.project-configuration.form-menu');
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }
}
