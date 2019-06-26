<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:14
 */

namespace Faizalami\LaravelMager\Components\Generators;

use Faizalami\LaravelMager\Components\JsonIO;

class ControllerGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'controller';
        $this->config = $config;
        $namespacePath = array_slice(explode('\\', $this->config['namespace']), 1);
        $this->outputPath = app_path(implode('/', $namespacePath));
        $this->outputFile = $this->config['name'] . '.php';
    }

    public function render()
    {
        $template = 'mager::template.controller';

        foreach ($this->config['pages'] as $pageName => $page) {
            if ($page->redirect != '') {
                $redirect = explode('/', $page->redirect);

                $jsonIO = new JsonIO();
                $redirectController = $jsonIO->loadJsonFile('pages/' . $redirect[0] . '/controller/' . $redirect[0] . '.json')
                    ->toObject();

                if ($redirectController) {
                    foreach ($redirectController->pages as $redirectPage) {
                        if ($redirectPage->url == $redirect[1]) {
                            $this->config['pages']->{$pageName}->redirectRoute = str_replace('/', '.', $page->redirect);
                            $this->config['pages']->{$pageName}->redirectHasParam = in_array('id', $redirectPage->params);
                        }
                    }

                    if (!isset($this->config['pages']->{$pageName}->redirectRoute)) {
                        $this->config['pages']->{$pageName}->redirectRoute = '';
                        $this->config['pages']->{$pageName}->redirectHasParam = false;
                    }
                } else {
                    $this->config['pages']->{$pageName}->redirectRoute = '';
                    $this->config['pages']->{$pageName}->redirectHasParam = false;
                }
            }
        }

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }
}
