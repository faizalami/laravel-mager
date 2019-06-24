<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:33
 */
?>

{{ '<?'.'php' }}

namespace {{ $namespace }};

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Controller as BaseController;

class {{ $name }} extends Controller {

    private $controller;

    public function __construct(Request $request)
    {
        @if($web == true && $rest == true)
        $requestType = 'web';
        if ($request->is('api/*')) {
            $requestType = 'rest';
        }
        @elseif($web == true && $rest == false)
        $requestType = 'web';
        @elseif($web == false && $rest == true)
        $requestType = 'web';
        @endif
        $this->controller = (new BaseController())->getController($requestType, '{{ $model }}', '{{ $pageName }}');
    }

@foreach($pages as $requestName => $page)
    @switch($page->resource)

    @case('index')
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function {{ $requestName }}()
    {
        return $this->controller->index('{{ $url . '.' . $page->view }}');
    }
    @break

    @case('create')
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function {{ $requestName }}Form()
    {
        return $this->controller->create('{{ $url . '.' . $page->view }}');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function {{ $requestName }}Store(Request $request)
    {
        return $this->controller->store($request, function ($id) {
    @if($page->redirectRoute != '')
        @if($page->redirectHasParam)
            return response()->redirectToRoute('{{ $page->redirectRoute }}', ['id' => $id]);
        @else
            return response()->redirectToRoute('{{ $page->redirectRoute }}');
        @endif
    @else
        @if($page->redirect != '')
            return response()->redirectTo('{{ $page->redirect }}');
        @elseif($page->redirect == '' && $defaultPage != '')
            return response()->redirectTo('{{ $url }}/{{ $defaultPage }}');
        @else
            return response()->redirectTo('/');
        @endif
    @endif
        });
    }
    @break

    @case('show')
    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function {{ $requestName }}($id)
    {
        return $this->controller->show($id, '{{ $url . '.' . $page->view }}');
    }
    @break

    @case('edit')
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function {{ $requestName }}Form($id)
    {
        return $this->controller->edit($id, '{{ $url . '.' . $page->view }}');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function {{ $requestName }}Update(Request $request, $id)
    {
        return $this->controller->update($request, $id, function ($id) {
    @if($page->redirectRoute != '')
        @if($page->redirectHasParam)
            return response()->redirectToRoute('{{ $page->redirectRoute }}', ['id' => $id]);
        @else
            return response()->redirectToRoute('{{ $page->redirectRoute }}');
        @endif
    @else
        @if($page->redirect != '')
            return response()->redirectTo('{{ $page->redirect }}');
        @elseif($page->redirect == '' && $defaultPage != '')
            return response()->redirectTo('{{ $url }}/{{ $defaultPage }}');
        @else
            return response()->redirectTo('/');
        @endif
    @endif
        });
    }
    @break

    @case('destroy')
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function {{ $requestName }}($id)
    {
        return $this->controller->destroy($id, function ($id) {
        @if($defaultPage != '')
            return response()->redirectTo('{{ $url }}/{{ $defaultPage }}');
        @else
            return response()->redirectTo('/');
        @endif
        });
    }
    @break

    @endswitch
@endforeach
}
