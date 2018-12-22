<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:34
 */
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
        @if(count($page['methods']) > 1)
        Route::{{ $page['methods'][0] }}();
        @else
        Route::match({{ str_replace('"', '\'', json_encode($page['methods'])) }}, '/{{ $page['url'] }}', '{{ $name . '@' . $page['resource'] }}');
        @endif
    @endforeach
    });

    Route::group([
        'middleware' => 'api',
        'prefix' => 'api/{{ $url }}',
        'as' => '{{ $url }}.api.'
    ], function () {
    @foreach($pages as $pageName => $page)
        @if(count($page['methods']) > 1)
        Route::{{ $page['methods'][0] }}();
        @else
        Route::match({{ str_replace('"', '\'', json_encode($page['methods'])) }}, '/{{ $page['url'] }}', '{{ $name . '@' . $page['resource'] }}');
        @endif
    @endforeach
    });
});