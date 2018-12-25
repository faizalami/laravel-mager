<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:34
 */

function pageUrl($pageUrl, $params) {
    if(count($params) > 0) {
        foreach ($params as $param) {
            $pageUrl .= '/{' . $param . '}';
        }
    }

    return $pageUrl;
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
    @foreach($pages as $pageName => $page)
        @if(count($page->methods) > 1)
        Route::match({{ str_replace('"', '\'', json_encode($page->methods)) }}, '/{{ pageUrl($page->url, $page->params) }}', '{{ $name . '@' . $page->resource }}')->name('{{ $page->url }}');
        @else
        Route::{{ $page->methods[0] }}('/{{ pageUrl($page->url, $page->params) }}', '{{ $name . '@' . $page->resource }}')->name('{{ $page->url }}');
        @endif
    @endforeach
    });

    Route::group([
        'middleware' => 'api',
        'prefix' => 'api/{{ $url }}',
        'as' => '{{ $url }}.api.'
    ], function () {
    @foreach($pages as $pageName => $page)
        @if(count($page->methods) > 1)
        Route::match({{ str_replace('"', '\'', json_encode($page->methods)) }}, '/{{ pageUrl($page->url, $page->params) }}', '{{ $name . '@' . $page->resource }}')->name('{{ $page->url }}');
        @else
        Route::{{ $page->methods[0] }}('/{{ pageUrl($page->url, $page->params) }}', '{{ $name . '@' . $page->resource }}')->name('{{ $page->url }}');
        @endif
    @endforeach
    });
});
