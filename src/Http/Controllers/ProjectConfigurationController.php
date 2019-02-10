<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:14
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectConfigurationController extends Controller
{
    public function theme() {
        return view('mager::pages.project-configuration.theme');
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
