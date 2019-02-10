<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:16
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatabaseManagerController extends Controller
{
    public function index() {
        return view('mager::pages.database-manager.index');
    }

    public function tableProperties($table) {
        return view('mager::pages.database-manager.table-properties');
    }

    public function tableData($table) {
        return view('mager::pages.database-manager.table-data');
    }

    public function createTable(Request $request) {
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-table');
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }

    public function createColumn(Request $request, $table) {
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-column');
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }

    public function createData(Request $request, $table) {
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-data');
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }

    public function createDummy(Request $request, $table) {
        if ($request->isMethod('get')) {
            return view('mager::pages.database-manager.form-dummy');
        } elseif ($request->isMethod('post')) {
            return null;
        }
    }
}
