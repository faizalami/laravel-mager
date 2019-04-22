<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/04/19
 * Time: 10:29
 */

namespace App\Http\Controllers\Base;


use Illuminate\Http\Request;

class WebController implements BaseControllerInterface
{
    public $model;
    public $pageName;

    public function __construct($model, $pageName)
    {
        $this->model = '\\App\\Models\\' . $model;
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
        return view($view, compact('data'));
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
        return view($view, compact('data'));
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
        $isEdit = false;
        return view($view, compact('data', 'isEdit'));
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

        return call_user_func($redirect, $data->id);
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
        $isEdit = true;
        return view($view, compact('data', 'isEdit'));
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

        return call_user_func($redirect, $id);
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

        return call_user_func($redirect, $id);
    }
}
