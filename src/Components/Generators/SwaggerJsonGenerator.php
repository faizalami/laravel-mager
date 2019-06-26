<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 22/04/19
 * Time: 19:59
 */

namespace Faizalami\LaravelMager\Components\Generators;

class SwaggerJsonGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'model';
        $this->config = $config;
        $this->outputPath = public_path('swagger');
        $this->outputFile = 'swagger.json';
    }

    public function render()
    {
        $template = 'mager::template.swagger-json';

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }
}
