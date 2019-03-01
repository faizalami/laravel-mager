<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 01/03/19
 * Time: 15:12
 */

namespace Faizalami\LaravelMager\Components\Generators;


class NavbarMenuGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'navbar';
        $this->config = $config;
        $this->outputPath = config_path('global');
        $this->outputFile = 'navbar.php';
    }

    public function render()
    {
        $template = 'mager::template.config.navbar';

        $menu = $this->config;
        $menu = str_replace('{', '[', $menu);
        $menu = str_replace('"', '\'', $menu);
        $menu = str_replace(':', '=>', $menu);
        $menu = str_replace('}', ']', $menu);

        $this->outputString = $this->renderBlade($template, compact('menu'));

        return $this;
    }
}
