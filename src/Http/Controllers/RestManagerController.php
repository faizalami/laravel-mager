<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 27/09/18
 * Time: 17:16
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Faizalami\LaravelMager\Components\JsonIOControllerTrait;

class RestManagerController extends Controller
{
    use JsonIOControllerTrait;

    public function index() {
        $pages = $this->loadJson('configs/pages.json');

        $controllers = [];
        foreach ($pages as $page) {
            $controller = $this->loadJson('pages/' . $page . '/controller/' . $page . '.json');
            if($controller->rest) {
                array_push($controllers, $controller);
            }
        }

        return view('mager::pages.rest-manager.index', compact('controllers'));
    }

    public function format() {
        return view('mager::pages.rest-manager.index');
    }
}
