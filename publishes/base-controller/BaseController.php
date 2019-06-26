<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/04/19
 * Time: 8:56
 */

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;

/**
 * Interface BaseControllerInterface
 * @package App\Http\Controllers\Base
 */
interface BaseController
{

    /**
     * BaseControllerInterface constructor.
     * @param $model
     * @param $pageName
     */
    public function __construct($model);

    /**
     * Display a listing of the resource.
     *
     * @param $view
     * @return \Illuminate\Http\Response
     */
    public function index($view);

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param $view
     * @return \Illuminate\Http\Response
     */
    public function show($id, $view);

    /**
     * Show the form for creating a new resource.
     *
     * @param $view
     * @return \Illuminate\Http\Response
     */
    public function create($view);

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $redirect
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $redirect);

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param $view
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $view);

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param $redirect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $redirect);

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $redirect);
}
