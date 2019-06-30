<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/04/19
 * Time: 21:06
 */

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;

/**
 * Class RestController
 * @package App\Http\Controllers\Base
 */
class RestController implements BaseController
{
    /**
     * @var string
     */
    private $model;
    /**
     * @var string
     */
    private $resource;
    /**
     * @var string
     */
    private $collection;
    /**
     * @var
     */
    private $pageName;

    /**
     * BaseControllerInterface constructor.
     * @param $model
     * @param $pageName
     */
    public function __construct($model, $pageName)
    {
        $this->model = '\\App\\Models\\' . $model;
        $this->resource = '\\App\\Http\\Resources\\' . $model . 'Resource';
        $this->collection = '\\App\\Http\\Resources\\' . $model . 'Collection';
        $this->pageName = $pageName;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $view
     * @return \Illuminate\Http\Response
     */
    public function index($view)
    {
        $data = $this->model::all();

        return $this->jsonResponse($data, 'Get ' . $this->pageName . ' Data Success!', 'collection');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param $view
     * @return \Illuminate\Http\Response
     */
    public function show($id, $view)
    {
        $data = $this->model::find($id);

        return $this->jsonResponse($data, 'Get ' . $this->pageName . ' Item Success!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $view
     * @return \Illuminate\Http\Response
     */
    public function create($view)
    {
        $data = new $this->model();

        return $this->jsonResponse($data, 'New ' . $this->pageName . ' Item.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $redirect
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $redirect)
    {
        $data = new $this->model($request->all());
        $data->save();

        return $this->jsonResponse($data, 'Create New ' . $this->pageName . ' Item Success!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param $view
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $view)
    {
        $data = $this->model::find($id);

        return $this->jsonResponse($data, 'Edit ' . $this->pageName . ' Item.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param $redirect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $redirect)
    {
        $data = $this->model::find($id);
        $data->fill($request->all());
        $data->save();

        return $this->jsonResponse($data, 'Update ' . $this->pageName . ' Item Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $redirect)
    {
        $data = $this->model::find($id);
        $data->delete();

        $data = new $this->model();

        return $this->jsonResponse($data, 'Delete ' . $this->pageName . ' Item Success!');
    }

    /**
     * @param $data
     * @param $message
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    private function jsonResponse($data, $message, $type = 'resource')
    {
        if (config('global.rest.wrap')) {
            $additional = [];
            if (config('global.rest.message')) {
                $additional = [
                    'message' => $message
                ];
            }
            return (new $this->{$type}($data))->additional($additional);
        } else {
            return response()->json(new class {
            });
        }
    }
}
