<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:33
 */
?>

{{ '<?'.'php' }}

use Faker\Generator as Faker;

$factory->define(App\Models\{{ $model }}::class, function (Faker $faker) {
    return [
        @foreach($dummy as $column)
            "{{ $column['name'] }}" => {{ $column['faker'] }}
        @endforeach
    ];
});
