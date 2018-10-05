<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 05/10/18
 * Time: 16:52
 */

namespace Faizalami\LaravelMager\Components;


class JsonIO
{
    private $jsonString;
    private $jsonObject;

    /**
     * @param $path
     * @return $this
     */
    public function loadJsonFile($path) {
        $this->jsonString = file_get_contents(base_path(config('mager.data').$path));
        $this->jsonObject = json_decode($this->jsonString);

        return $this;
    }

    public function toObject() {
        return $this->jsonObject;
    }

    public function toArray() {
        return (array) $this->jsonObject;
    }

    public function toString() {
        return $this->jsonString;
    }

    public function __toString() {
        return $this->jsonString;
    }


}