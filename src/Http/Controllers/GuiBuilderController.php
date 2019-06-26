<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 05/10/18
 * Time: 16:10
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Faizalami\LaravelMager\Components\JsonIOControllerTrait;

class GuiBuilderController extends Controller
{
    use JsonIOControllerTrait;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function guiBuilder($controller, $page)
    {
        $configController = $this->loadJson('pages/' . $controller . '/controller/' . $controller . '.json');
        $configControllerPage = $configController->pages->{$page};
        $configView = $this->loadJson('pages/' . $controller . '/view/' . $configControllerPage->view . '.json');
        $builderType = $configView->type;

        return view('mager::pages.pages-manager.gui-builder', compact('configView', 'builderType'));
    }
}
