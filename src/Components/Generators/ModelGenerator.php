<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:14
 */

namespace Faizalami\LaravelMager\Components\Generators;


class ModelGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'model';
        $this->config = $config;
        $this->outputPath = app_path('Models');
        $this->outputFile = $this->config['name'] . '.php';
    }

    public function render()
    {
        $template = 'mager::template.database.model';

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }
}
