<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 02/12/18
 * Time: 14:25
 */

namespace Faizalami\LaravelMager\Http\Controllers;

use App\Http\Controllers\Controller;
use Faizalami\LaravelMager\Components\JsonIO;
use Illuminate\Http\Request;

class JsonIOController extends Controller
{
    public function loadJson($type, array $param) {
        $jsonIO = new JsonIO();
        $jsonString = '';
        switch ($type) {
            case 'page':
                $jsonString = $jsonIO->loadJsonFile('pages/'.$param[1].'/'.$param[0].'/'.$param[2].'.json');
                break;
            case 'template':
            case 'config':
                $jsonString = $jsonIO->loadJsonFile($type.'s/'.$param[0].'/'.$param[1].'.json');
                break;
        }

        return $jsonString;
    }

    public function writeJson(Request $request, $type, array $param) {
        $jsonIO = new JsonIO();
        $jsonObject = $jsonIO->setJsonFromObject($request->all(), true);

        switch ($type) {
            case 'page':
                $jsonObject = $jsonIO->saveJsonFile('pages/'.$param[1].'/'.$param[0].'/'.$param[2].'.json');
                break;
            case 'template':
            case 'config':
                $jsonObject = $jsonIO->saveJsonFile($type.'s/'.$param[0].'/'.$param[1].'.json');
                break;
        }

        if($jsonObject) {
            return [
                'status' => true,
                'message' => 'Save properties success.',
                'data' => $jsonObject
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Save properties failed.',
                'data' => null
            ];
        }
    }
}