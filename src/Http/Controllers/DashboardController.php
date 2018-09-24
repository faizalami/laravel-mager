<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 20/09/18
 * Time: 11:38
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        return view('mager::pages.dashboard');
    }
}
