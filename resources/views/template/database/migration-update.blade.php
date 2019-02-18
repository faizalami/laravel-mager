<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 25/12/18
 * Time: 22:26
 */
?>

{{ '<?'.'php' }}

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Update{{ ucfirst($table) }}Table{{ $version }} extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('{{ $table }}', function (Blueprint $table) {
            @if(count($columns['created']) > 0)
            @foreach($columns['created'] as $columnName => $column)
            $table->{{ $column->type }}('{{ $columnName }}')->nullable();
            @endforeach
            @endif

            @if(count($columns['deleted']) > 0)
            $table->dropColumn([
                @foreach($columns['deleted'] as $columnName => $column)
                '{{ $columnName }}',
                @endforeach
            ]);
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
        Schema::table('{{ $table }}', function (Blueprint $table) {
            @if(count($columns['deleted']) > 0)
            @foreach($columns['deleted'] as $columnName => $column)
            $table->{{ $column->type }}('{{ $columnName }}')->nullable();
            @endforeach
            @endif

            @if(count($columns['created']) > 0)
            $table->dropColumn([
                @foreach($columns['created'] as $columnName => $column)
                '{{ $columnName }}',
                @endforeach
            ]);
            @endif
        });
    }
}
