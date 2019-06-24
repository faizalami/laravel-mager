<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/04/19
 * Time: 8:53
 */

namespace App\Http\Controllers\Base;


/**
 * Class BaseController
 * @package App\Http\Controllers\Base
 */
class Controller
{
    /**
     * @param $type
     * @param $model
     * @param $pageName
     * @return RestController|WebController
     */
    public function getController($type, $model, $pageName)
    {
        switch ($type) {
            case 'web':
                return new WebController($model, $pageName);
                break;
            case 'rest':
                return new RestController($model, $pageName);
                break;
        }
    }
}
