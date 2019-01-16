<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 16/01/19
 * Time: 8:22
 */

namespace Faizalami\LaravelMager\Components\Generators;


class SidebarLayoutGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'sidebar';
        $this->config = $config;
        $this->outputPath = resource_path('views/layouts');
        $this->outputFile = 'sidebar.blade.php';
    }

    public function render()
    {
        $template = 'mager::template.view.sidebar';

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }
}
