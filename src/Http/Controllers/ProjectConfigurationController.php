<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:14
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;

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
}
