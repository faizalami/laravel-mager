<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 03/01/19
 * Time: 17:11
 */

namespace Faizalami\LaravelMager\Components;


trait JsonIOControllerTrait
{

    public $jsonIO = null;

    public function __construct()
    {
        $this->jsonIO = new JsonIO();
    }

    private function loadJson($path) {
        return $this->jsonIO->loadJsonFile($path)->toObject();
    }

    private function saveJson($data, $path) {
        $this->jsonIO
            ->setJsonFromObject($data, true)
            ->saveJsonFile($path);
    }
}