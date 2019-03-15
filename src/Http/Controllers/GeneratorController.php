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
        date_default_timezone_set('Asia/Jakarta');
        $jsonIO = new JsonIO();

        $pages = $jsonIO->loadJsonFile('configs/pages.json')->toArray();

        Artisan::call('config:clear');
        Artisan::call('db:create');

        foreach ($pages as $page) {
            $pageConfig = $jsonIO->loadJsonFile('pages/'.$page.'/'.$page.'.json')->toArray();

            $controllerConfig = $jsonIO->loadJsonFile('pages/'.$page.'/controller/'.$pageConfig['controllerConfig'].'.json')->toArray();
            $modelConfig = $jsonIO->loadJsonFile('pages/'.$page.'/model/'.$pageConfig['modelConfig'].'.json')->toArray();

            $this->queueConfig('controller', $controllerConfig);
            $this->queueConfig('route', $controllerConfig);
            $this->queueConfig('migration', $modelConfig);
            $this->queueConfig('model', $modelConfig);

            $controllerConfig['generatedAt'] = date('Y_m_d_His');
            $jsonIO->setJsonFromObject($controllerConfig, true)
                ->saveJsonFile('pages/'.$page.'/controller/'.$pageConfig['controllerConfig'].'.json');

            $modelConfig['generatedAt'] = date('Y_m_d_His');
            $jsonIO->setJsonFromObject($modelConfig, true)
                ->saveJsonFile('pages/'.$page.'/model/'.$pageConfig['modelConfig'].'.json');

            foreach ($pageConfig['viewConfig'] as $view) {
                $links = [
                    'show' => null,
                    'create' => null,
                    'edit' => null,
                    'destroy' => null
                ];

                foreach (array_keys($links) as $resource) {
                    $key = array_search($resource, array_column((array) $controllerConfig['pages'], 'resource'));

                    if($key !== false) {
                        $links[$resource] = array_column((array) $controllerConfig['pages'], 'url')[$key];
                    }
                }

                $viewConfig = $jsonIO->loadJsonFile('pages/'.$page.'/view/'.$view->config.'.json')->toArray();

                $viewConfig['generatedAt'] = date('Y_m_d_His');
                $jsonIO->setJsonFromObject($viewConfig, true)
                    ->saveJsonFile('pages/'.$page.'/view/'.$view->config.'.json');

                $this->queueConfig('view', ['view' => $viewConfig, 'links' => $links, 'model' => $modelConfig['columns']]);
            }
        }

        $this->queueConfig('sidebar', $jsonIO->loadJsonFile('configs/sidebar.json')->toString());
        $this->queueConfig('navbar', $jsonIO->loadJsonFile('configs/navbar.json')->toString());
        $this->queueConfig('theme', $jsonIO->loadJsonFile('configs/main.json')->toString());

        foreach ($this->generateQueue as $generate) {
            $generator = Generator::init($generate['type'], $generate['config']);
            $generator->render()->generate();
        }

        Artisan::call('config:clear');

        return 'success';
    }

    private function queueConfig($type, $config) {
        array_push($this->generateQueue, [
            'type' => $type,
            'config' => $config
        ]);
    }
}
