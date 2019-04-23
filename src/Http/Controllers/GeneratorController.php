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
use Illuminate\Support\Facades\File;

class GeneratorController extends Controller
{
    private $generateQueue = [];

    public function generate() {
        $jsonIO = new JsonIO();

        $pages = $jsonIO->loadJsonFile('configs/pages.json')->toArray();

        Artisan::call('config:clear');
        Artisan::call('db:create');

        $this->setUrl();

        $restConfig = $jsonIO->loadJsonFile('configs/restFormat.json')->toArray();
        $this->queueConfig('restConfig', $restConfig);

        $swaggerConfig = $restConfig;
        $swaggerConfig['pages'] = [];

        foreach ($pages as $page) {
            $pageConfig = $jsonIO->loadJsonFile('pages/'.$page.'/'.$page.'.json')->toArray();

            $controllerConfig = $jsonIO->loadJsonFile('pages/'.$page.'/controller/'.$pageConfig['controllerConfig'].'.json')->toArray();
            $modelConfig = $jsonIO->loadJsonFile('pages/'.$page.'/model/'.$pageConfig['modelConfig'].'.json')->toArray();

            $generatedModel = [];
            if($modelConfig['generatedAt'] != null) {
                $generatedAt = \DateTime::createFromFormat('Y_m_d_His', $modelConfig['generatedAt']);
                foreach (array_reverse($modelConfig['history']) as $history) {
                    $modelTime = \DateTime::createFromFormat('Y_m_d_His', $history->time);

                    if ($generatedAt >= $modelTime) {
                        $generatedModel = $history->table;
                        break;
                    }
                }
            }

            $swaggerConfig['pages'][] = [
                'controller' => $controllerConfig,
                'model' => $generatedModel,
            ];

            $this->queueConfig('controller', $controllerConfig);
            $this->queueConfig('route', $controllerConfig);
            $this->queueConfig('migration', $modelConfig);
            $this->queueConfig('model', $modelConfig);

            if($restConfig['wrap']) {
                $restConfig['name'] = $modelConfig['name'];
                $this->queueConfig('resource', $restConfig);
                $this->queueConfig('collection', $restConfig);
            }

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
        $this->queueConfig('swaggerJson', $swaggerConfig);

        foreach ($this->generateQueue as $generate) {
            $generator = Generator::init($generate['type'], $generate['config']);
            $generator->render()->generate();
        }

        Artisan::call('config:clear');

        return 'success';
    }

    private function setUrl() {
        Artisan::call('config:clear');

        $envPath = base_path('.env');

        if(File::exists($envPath)) {
            $envFile = File::get($envPath);
            $urlConfig = 'APP_URL=\''.config('app.url').'\'';
            if(strpos($envFile, $urlConfig) === false) {
                $urlConfig = 'APP_URL='.config('app.url');
            }

            $newUrl = url('/');

            File::put($envPath, str_replace(
                $urlConfig,
                'APP_URL=\''.$newUrl.'\'',
                $envFile
            ));
        }
        putenv('APP_NAME='.$newUrl);

        Artisan::call('config:cache');
    }

    private function queueConfig($type, $config) {
        array_push($this->generateQueue, [
            'type' => $type,
            'config' => $config
        ]);
    }
}
