<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 13/04/19
 * Time: 13:22
 */

namespace Faizalami\LaravelMager\Components\Generators;


class ResourceGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'model';
        $this->config = $config;
        $this->outputPath = app_path('Http/Resources');
        $this->outputFile = $this->config['name'] . 'Resource.php';
    }

    public function render()
    {
        $template = 'mager::template.database.resource';

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }
}