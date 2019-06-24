<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 05/10/18
 * Time: 16:52
 */

namespace Faizalami\LaravelMager\Components;


use Illuminate\Support\Facades\File;

/**
 * Class JsonIO
 * @package Faizalami\LaravelMager\Components
 */
class JsonIO
{
    /**
     * @var
     */
    private $jsonString;
    /**
     * @var
     */
    private $jsonObject;

    /**
     * @param $path
     * @return $this
     */
    public function loadJsonFile($path) {
        try {
            $this->jsonString = File::get(base_path(config('mager.data').$path));
        } catch (\Exception $e) {
            $this->jsonString = "null";
        }
        $this->jsonObject = json_decode($this->jsonString);

        return $this;
    }

    /**
     * @param $jsonString
     * @param bool $prettify
     * @return $this
     */
    public function setJsonFromString($jsonString, $prettify = false) {
        $this->jsonObject =  json_decode($jsonString);
        $this->jsonString = $prettify ? json_encode($this->jsonObject, JSON_PRETTY_PRINT) : json_encode($this->jsonObject);

        return $this;
    }

    /**
     * @param $jsonObject
     * @param bool $prettify
     * @return $this
     */
    public function setJsonFromObject($jsonObject, $prettify = false) {
        $this->jsonObject = $jsonObject;
        $this->jsonString = $prettify ? json_encode($this->jsonObject, JSON_PRETTY_PRINT) : json_encode($this->jsonObject);

        return $this;
    }

    /**
     * @param $path
     * @return bool
     */
    public function saveJsonFile($path) {
        $path = base_path(config('mager.data').$path);

        $explodedPath = explode('/', $path);
        $pathString = '/';

        if(strpos(strtolower(PHP_OS), 'win') !== false) {
            $pathString = '';
        }

        foreach($explodedPath as $key => $directory) {
            if($key != count($explodedPath) - 1) {
                $pathString .= $directory . '/';

                if (!is_dir($pathString)) {
                    mkdir($pathString);
                }
            }
        }

        return File::put($path, $this->jsonString) !== false;
    }

    /**
     * @return mixed
     */
    public function toObject() {
        return $this->jsonObject;
    }

    /**
     * @param bool $recursive
     * @return array|mixed
     */
    public function toArray($recursive = false) {
        if($recursive) {
            return json_decode($this->jsonString, true);
        } else {
            return (array) $this->jsonObject;
        }
    }

    /**
     * @return mixed
     */
    public function toString() {
        return $this->jsonString;
    }

    /**
     * @return mixed
     */
    public function __toString() {
        return $this->jsonString;
    }


}
