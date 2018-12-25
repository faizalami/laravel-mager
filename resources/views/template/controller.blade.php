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
use App\Models\{{ $model }};

class {{ $name }} extends Controller {
    private $isApi = false;

    public function __construct(Request $request)
    {
        if ($request->is('api/*')) {
            $this->isApi = true;
        }
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        ${{ $modelObject }} = {{ $model }}::all();
        $columnLabels =  {{ $model }}::$columnLabels;

        if($this->isApi) {
            return response()->json(${{ $modelObject }});
        } else {
            return view('{{ $url . '.' . $pages->index->view }}', compact('{{ $modelObject }}', 'columnLabels'));
        }
    }

    /**
    * Show the form for creating a new resource.
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            ${{ $modelObject }} = new {{ $model }}();
            return view('{{ $url . '.' . $pages->create->view }}', compact('{{ $modelObject }}'));
        } elseif ($request->isMethod('post')) {
            ${{ $modelObject }} = new {{ $model }}($request->all());
            ${{ $modelObject }}->save();

            if($this->isApi) {
                return response()->json(${{ $modelObject }});
            } else {
                return redirect(route('{{ $url . '.' . $pages->view->url }}', ['id' => ${{ $modelObject }}->id]))->with('success', '{{ $model }} has been added');
            }
        }
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
        $columnLabels =  {{ $model }}::$columnLabels;

        if($this->isApi) {
            return response()->json(${{ $modelObject }});
        } else {
            return view('{{ $url . '.' . $pages->view->view }}', compact('{{ $modelObject }}', 'columnLabels'));
        }
    }

    /**
    * Show the form for editing the specified resource.
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Request $request, $id)
    {
        ${{ $modelObject }} = {{ $model }}::find($id);

        if ($request->isMethod('get')) {
            if($this->isApi) {
                return response()->json(${{ $modelObject }});
            } else {
                return view('{{ $url . '.' . $pages->update->view }}', compact('{{ $modelObject }}'));
            }
        } elseif ($request->isMethod('post')) {
            ${{ $modelObject }}->fill($request->all());

            if($this->isApi) {
                return response()->json(${{ $modelObject }});
            } else {
                return redirect(route('{{ $url . '.' . $pages->view->url }}', ['id' => ${{ $modelObject }}->id]))->with('success', '{{ $model }} has been updated');
            }
        }
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

        if($this->isApi) {
            return response()->json(true);
        } else {
            return redirect(route('{{ $url . '.' . $pages->index->url }}'))->with('success', '{{ $model }} item has been deleted');
        }
    }
}
