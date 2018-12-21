<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:33
 */

$modelObject = lcfirst($model);

?>

{{ '<?'.'php' }}

namespace {{ $namespace }};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class {{ $name }} extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        ${{ $modelObject }} = {{ $model }}::all();
        return view('{{ $id . '.' . $pages->index->view }}', compact('{{ $modelObject }}'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('{{ $id . '.' . $pages->create->view }}');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        ${{ $modelObject }} = new {{ $model }}($request->all());
        ${{ $modelObject }}->save();

        return redirect(route('{{ $url . '.' . $pages->show->url }}', ['id' => ${{ $modelObject }}->id]))->with('success', '{{ $model }} has been added');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        ${{ $modelObject }} = {{ $model }}::find($id);

        return view('{{ $id . '.' . $pages->show->view }}', compact('{{ $modelObject }}'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        ${{ $modelObject }} = {{ $model }}::find($id);

        return view('{{ $id . '.' . $pages->edit->view }}', compact('{{ $modelObject }}'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        ${{ $modelObject }} = {{ $model }}::find($id);
        ${{ $modelObject }}->fill($request->all());

        return redirect(route('{{ $url . '.' . $pages->show->url }}', ['id' => ${{ $modelObject }}->id]))->with('success', '{{ $model }} has been updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        ${{ $modelObject }} = {{ $model }}::find($id);
        ${{ $modelObject }}->delete();

        return redirect(route('{{ $url . '.' . $pages->index->url }}'))->with('success', '{{ $model }} item has been deleted');
    }
}
