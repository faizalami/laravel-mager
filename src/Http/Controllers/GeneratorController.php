<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 24/12/18
 * Time: 21:22
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use Faizalami\LaravelMager\Components\JsonIO;
use Faizalami\LaravelMager\Components\Generator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class GeneratorController extends Controller
{
    private $generateQueue = [];

    public function generate() {
        $jsonIO = new JsonIO();

        $pages = $jsonIO->loadJsonFile('configs/pages.json')->toArray();

        Artisan::call('db:create');

        foreach ($pages as $page) {
            $pageConfig = $jsonIO->loadJsonFile('pages/'.$page.'/'.$page.'.json')->toArray();

            $controllerConfig = $jsonIO->loadJsonFile('pages/'.$page.'/controller/'.$pageConfig['controllerConfig'].'.json')->toArray();
            $modelConfig = $jsonIO->loadJsonFile('pages/'.$page.'/model/'.$pageConfig['modelConfig'].'.json')->toArray();

            $this->queueConfig('controller', $controllerConfig);
            $this->queueConfig('route', $controllerConfig);
            $this->queueConfig('migration', $modelConfig);
            $this->queueConfig('model', $modelConfig);

            foreach ($pageConfig['viewConfig'] as $view) {
                $viewConfig = $jsonIO->loadJsonFile('pages/'.$page.'/view/'.$view->config.'.json')->toArray();
                $this->queueConfig('view', $viewConfig);
            }
        }

        foreach ($this->generateQueue as $generate) {
            $generator = Generator::init($generate['type'], $generate['config']);
            $generator->render()->generate();
        }

        return 'success';
    }

    private function queueConfig($type, $config) {
        array_push($this->generateQueue, [
            'type' => $type,
            'config' => $config
        ]);
    }
}
