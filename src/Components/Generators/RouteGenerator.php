<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 19:09
 */

namespace Faizalami\LaravelMager\Components\Generators;


class RouteGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'route';
        $this->config = $config;
        $this->outputPath = base_path('routes/app');
        $this->outputFile = $this->config['url'] . '.php';
    }

    public function render()
    {
        $template = 'mager::template.route';

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }
}
