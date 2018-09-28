<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:12
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesManagerController extends Controller
{
    public function index() {
        return view('mager::pages.pages-manager.index');
    }
}
