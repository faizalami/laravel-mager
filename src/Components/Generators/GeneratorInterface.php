<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:15
 */

namespace Faizalami\LaravelMager\Components\Generators;


interface GeneratorInterface
{
    public function __construct($config);

    public function render();
}
