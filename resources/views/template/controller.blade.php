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

@foreach($pages as $pageName => $page)
    @switch($page->resource)

    @case('index')
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function {{ $pageName }}()
    {
        ${{ $modelObject }} = {{ $model }}::all();
        $columnLabels =  {{ $model }}::$columnLabels;

        if($this->isApi) {
            return response()->json(${{ $modelObject }});
        } else {
            return view('{{ $url . '.' . $page->view }}', compact('{{ $modelObject }}', 'columnLabels'));
        }
    }
    @break

    @case('create')
    /**
    * Show the form for creating a new resource.
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function {{ $pageName }}(Request $request)
    {
        if ($request->isMethod('get')) {
            ${{ $modelObject }} = new {{ $model }}();
            return view('{{ $url . '.' . $page->view }}', compact('{{ $modelObject }}'));
        } elseif ($request->isMethod('post')) {
            ${{ $modelObject }} = new {{ $model }}($request->all());
            ${{ $modelObject }}->save();

            if($this->isApi) {
                return response()->json(${{ $modelObject }});
            } else {
            @if($page->redirectRoute != '')
                @if($page->redirectHasParam)
                    return response()->redirectToRoute('{{ $page->redirectRoute }}', ['id' => ${{ $modelObject }}->id]);
                @else
                    return response()->redirectToRoute('{{ $page->redirectRoute }}');
                @endif
            @else
                @if($page->redirect != '')
                    return response()->redirectTo('{{ $url }}/{{ $page->redirect }}');
                @elseif($page->redirect == '' && $defaultPage != '')
                    return response()->redirectTo('{{ $url }}/{{ $defaultPage }}');
                @else
                    return response()->redirectTo('/');
                @endif
            @endif
            }
        }
    }
    @break

    @case('show')
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function {{ $pageName }}($id)
    {
        ${{ $modelObject }} = {{ $model }}::find($id);
        $columnLabels =  {{ $model }}::$columnLabels;

        if($this->isApi) {
            return response()->json(${{ $modelObject }});
        } else {
            return view('{{ $url . '.' . $page->view }}', compact('{{ $modelObject }}', 'columnLabels'));
        }
    }
    @break

    @case('edit')
    /**
    * Show the form for editing the specified resource.
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function {{ $pageName }}(Request $request, $id)
    {
        ${{ $modelObject }} = {{ $model }}::find($id);

        if ($request->isMethod('get')) {
            if($this->isApi) {
                return response()->json(${{ $modelObject }});
            } else {
                return view('{{ $url . '.' . $page->view }}', compact('{{ $modelObject }}'));
            }
        } elseif ($request->isMethod('post')) {
            ${{ $modelObject }}->fill($request->all());
            ${{ $modelObject }}->save();

            if($this->isApi) {
                return response()->json(${{ $modelObject }});
            } else {
            @if($page->redirectRoute != '')
                @if($page->redirectHasParam)
                    return response()->redirectToRoute('{{ $page->redirectRoute }}', ['id' => ${{ $modelObject }}->id]);
                @else
                    return response()->redirectToRoute('{{ $page->redirectRoute }}');
                @endif
            @else
                @if($page->redirect != '')
                    return response()->redirectTo('{{ $url }}/{{ $page->redirect }}');
                @elseif($page->redirect == '' && $defaultPage != '')
                    return response()->redirectTo('{{ $url }}/{{ $defaultPage }}');
                @else
                    return response()->redirectTo('/');
                @endif
            @endif
            }
        }
    }
    @break

    @case('destroy')
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function {{ $pageName }}($id)
    {
        ${{ $modelObject }} = {{ $model }}::find($id);
        ${{ $modelObject }}->delete();

        if($this->isApi) {
            return response()->json(true);
        } else {
            @if($defaultPage != '')
            return response()->redirectTo('{{ $url }}/{{ $defaultPage }}');
            @else
            return response()->redirectTo('/');
            @endif
        }

    }
    @break

    @endswitch
@endforeach
}
