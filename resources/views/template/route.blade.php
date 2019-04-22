<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:34
 */

if (!function_exists('renderPageUrl')) {
    function renderPageUrl($pageUrl, $params) {
        if(count($params) > 0) {
            foreach ($params as $param) {
                $pageUrl .= '/{' . $param . '}';
            }
        }

        return $pageUrl;
    }
}
?>

{{ '<?'.'php' }}

Route::group([
    'namespace' => '{{ $namespace }}'
], function () {
    Route::group([
        'middleware' => 'web',
        'prefix' => '{{ $url }}',
        'as' => '{{ $url }}.'
    ], function () {
    @foreach($pages as $requestName => $page)
    @if($page->web)
        @if(count($page->methods) > 1)
            @switch($page->resource)
                @case('create')
        Route::get('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}Form')->name('{{ $page->url }}');
        Route::post('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}Store')->name('{{ $page->url }}');
                @break
                @case('edit')
        Route::get('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}Form')->name('{{ $page->url }}');
        Route::match(['put', 'patch'], '/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}Update')->name('{{ $page->url }}');
                @break
                @case('destroy')
        Route::match(['post', 'delete'], '/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}')->name('{{ $page->url }}');
                @break
            @endswitch
        @else
        Route::{{ $page->methods[0] }}('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}')->name('{{ $page->url }}');
        @endif
    @endif
    @endforeach
    });

    Route::group([
        'middleware' => 'api',
        'prefix' => 'api/{{ $url }}',
        'as' => '{{ $url }}.api.'
    ], function () {
    @foreach($pages as $requestName => $page)
    @if($page->rest)
        @if(count($page->methods) > 1)
            @switch($page->resource)
                @case('create')
        Route::get('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}Form')->name('{{ $page->url }}');
        Route::post('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}Store')->name('{{ $page->url }}');
                @break
                @case('edit')
        Route::get('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}Form')->name('{{ $page->url }}');
        Route::match(['put', 'patch'], '/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}Update')->name('{{ $page->url }}');
                @break
                @case('destroy')
        Route::match(['post', 'delete'], '/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}')->name('{{ $page->url }}');
                @break
            @endswitch
        @else
        Route::{{ $page->methods[0] }}('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $requestName }}')->name('{{ $page->url }}');
        @endif
    @endif
    @endforeach
    });
});
