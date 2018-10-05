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

class GuiBuilderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function guiBuilder() {
        return view('mager::pages.pages-manager.gui-builder');
    }

    public function getComponentConfiguration() {
        $jsonIO = new JsonIO();

        return $jsonIO->loadJsonFile('config/component/properties.json');
    }
}