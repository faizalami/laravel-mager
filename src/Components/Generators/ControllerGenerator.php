<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:14
 */

namespace Faizalami\LaravelMager\Components\Generators;


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

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }
}
