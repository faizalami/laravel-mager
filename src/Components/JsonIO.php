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

    public function setJsonFromString($jsonString, $prettify = false) {
        $this->jsonObject =  json_decode($jsonString);
        $this->jsonString = $prettify ? json_encode($this->jsonObject, JSON_PRETTY_PRINT) : json_encode($this->jsonObject);

        return $this;
    }

    public function setJsonFromObject($jsonObject, $prettify = false) {
        $this->jsonObject = $jsonObject;
        $this->jsonString = $prettify ? json_encode($this->jsonObject, JSON_PRETTY_PRINT) : json_encode($this->jsonObject);

        return $this;
    }

    public function saveJsonFile($path) {
        $path = base_path(config('mager.data').$path);

        $explodedPath = explode('/', $path);
        $pathString = '/';
        foreach($explodedPath as $key => $directory) {
            if($key != count($explodedPath) - 1) {
                $pathString .= $directory . '/';

                if (!is_dir($pathString)) {
                    mkdir($pathString);
                }
            }
        }

        return file_put_contents($path, $this->jsonString) !== false;
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
