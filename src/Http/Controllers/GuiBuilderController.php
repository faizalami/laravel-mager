<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 05/10/18
 * Time: 16:10
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Faizalami\LaravelMager\Components\JsonIO;
use Illuminate\Http\Request;

class GuiBuilderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function guiBuilder() {
        return view('mager::pages.pages-manager.gui-builder');
    }

    public function loadComponentConfiguration() {
        $jsonIO = new JsonIO();

        return $jsonIO->loadJsonFile('config/component/properties.json');
    }

    public function loadPropertiesTemplate() {
        $jsonIO = new JsonIO();

        return $jsonIO->loadJsonFile('config/page/template.json');
    }

    public function loadProperties($controllerName, $pageName) {
        $jsonIO = new JsonIO();

        return $jsonIO->loadJsonFile('pages/' . $controllerName . '/' . $pageName . '.json');
    }

    public function saveProperties(Request $request, $controllerName, $pageName) {
        $jsonIO = new JsonIO();

        $saveJson = $jsonIO->setJsonFromObject($request->all(), true)->saveJsonFile('pages/' . $controllerName . '/' . $pageName . '.json');

        if($saveJson) {
            return [
                'status' => true,
                'message' => 'Save properties success.'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Save properties failed.'
            ];
        }
    }
}