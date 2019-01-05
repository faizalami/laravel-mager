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
    @foreach($pages as $pageName => $page)
        @if(count($page->methods) > 1)
        Route::match({{ str_replace('"', '\'', json_encode($page->methods)) }}, '/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $pageName }}')->name('{{ $page->url }}');
        @else
        Route::{{ $page->methods[0] }}('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $pageName }}')->name('{{ $page->url }}');
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
        Route::match({{ str_replace('"', '\'', json_encode($page->methods)) }}, '/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $pageName }}')->name('{{ $page->url }}');
        @else
        Route::{{ $page->methods[0] }}('/{{ renderPageUrl($page->url, $page->params) }}', '{{ $name . '@' . $pageName }}')->name('{{ $page->url }}');
        @endif
    @endforeach
    });
});
