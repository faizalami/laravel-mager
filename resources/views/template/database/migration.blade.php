<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 21/12/18
 * Time: 16:33
 */
?>

{{ '<?'.'php' }}

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Create{{ ucfirst($table) }}Table extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('{{ $table }}', function (Blueprint $table) {
            $table->increments('id');
            @foreach($columns as $columnName => $column)
            $table->{{ $column->type }}('{{ $columnName }}');
            @endforeach
            @if($timestamp)
            $table->timestamps();
            @endif
        });
    }
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('{{ $table }}');
    }
}
