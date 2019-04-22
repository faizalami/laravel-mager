<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/04/19
 * Time: 21:06
 */

namespace App\Http\Controllers\Base;


use Illuminate\Http\Request;

class RestController implements BaseControllerInterface
{
    public $model;
    public $resource;
    public $collection;
    public $pageName;

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

        if(config('global.rest.wrap')) {
            $additional = [];
            if(config('global.rest.message')) {
                $additional = [
                    'message' => 'Get ' . $this->pageName . ' Data Success!'
                ];
            }
            return (new $this->collection($data))->additional($additional);
        } else {
            return response()->json($data);
        }
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

        if(config('global.rest.wrap')) {
            $additional = [];
            if(config('global.rest.message')) {
                $additional = [
                    'message' => 'Get ' . $this->pageName . ' Item Success!'
                ];
            }
            return (new $this->resource($data))->additional($additional);
        } else {
            return response()->json($data);
        }
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

        if(config('global.rest.wrap')) {
            $additional = [];
            if(config('global.rest.message')) {
                $additional = [
                    'message' => 'New ' . $this->pageName . ' Item.'
                ];
            }
            return (new $this->resource($data))->additional($additional);
        } else {
            return response()->json($data);
        }
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

        if(config('global.rest.wrap')) {
            $additional = [];
            if(config('global.rest.message')) {
                $additional = [
                    'message' => 'Create New ' . $this->pageName . ' Item Success!'
                ];
            }
            return (new $this->resource($data))->additional($additional);
        } else {
            return response()->json($data);
        }
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

        if(config('global.rest.wrap')) {
            $additional = [];
            if(config('global.rest.message')) {
                $additional = [
                    'message' => 'Edit ' . $this->pageName . ' Item.'
                ];
            }
            return (new $this->resource($data))->additional($additional);
        } else {
            return response()->json($data);
        }
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

        if(config('global.rest.wrap')) {
            $additional = [];
            if(config('global.rest.message')) {
                $additional = [
                    'message' => 'Update ' . $this->pageName . ' Item Success!'
                ];
            }
            return (new $this->resource($data))->additional($additional);
        } else {
            return response()->json($data);
        }
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

        if(config('global.rest.wrap')) {
            $additional = [];
            if(config('global.rest.message')) {
                $additional = [
                    'message' => 'Delete ' . $this->pageName . ' Item Success!'
                ];
            }
            return (new $this->resource($data))->additional($additional);
        } else {
            return response()->json(new class{});
        }
    }
}
