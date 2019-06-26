<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:15
 */

namespace Faizalami\LaravelMager\Components\Generators;

/**
 * Interface GeneratorInterface
 * @package Faizalami\LaravelMager\Components\Generators
 */
interface GeneratorInterface
{
    /**
     * GeneratorInterface constructor.
     * @param $config
     */
    public function __construct($config);

    /**
     * @return mixed
     */
    public function render();
}
