<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:16
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;

class DatabaseManagerController extends Controller
{
    public function index() {
        return view('mager::pages.database-manager.index');
    }
}
