<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 22/12/18
 * Time: 15:57
 */

namespace Faizalami\LaravelMager\Components;


use Faizalami\LaravelMager\Components\Generators\ControllerGenerator;
use Faizalami\LaravelMager\Components\Generators\MigrationGenerator;
use Faizalami\LaravelMager\Components\Generators\ModelGenerator;
use Faizalami\LaravelMager\Components\Generators\RouteGenerator;
use Faizalami\LaravelMager\Components\Generators\SidebarMenuGenerator;
use Faizalami\LaravelMager\Components\Generators\ThemeGenerator;
use Faizalami\LaravelMager\Components\Generators\ViewGenerator;

class Generator
{
    public static function init($type, $config) {
        switch ($type) {
            case 'migration':
                return new MigrationGenerator($config);
                break;
            case 'model':
                return new ModelGenerator($config);
                break;
            case 'controller':
                return new ControllerGenerator($config);
                break;
            case 'route':
                return new RouteGenerator($config);
                break;
            case 'view':
                return new ViewGenerator($config);
                break;
            case 'sidebar':
                return new SidebarMenuGenerator($config);
                break;
            case 'theme':
                return new ThemeGenerator($config);
                break;
        }
    }
}
