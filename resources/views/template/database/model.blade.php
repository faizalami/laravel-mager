<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:33
 */
?>

{{ '<?'.'php' }}

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class {{ $name }} extends Model
{
    protected $table = '{{ $table }}';

    protected $fillable = [
        @foreach($columns as $columnName => $column)
        '{{ $columnName }}',
        @endforeach
    ];
}
