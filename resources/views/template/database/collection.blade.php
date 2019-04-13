<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 13/04/19
 * Time: 14:51
 */
?>

{{ '<?'.'php' }}

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DemoCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\DemoResource';

    /**
    * Transform the resource collection into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function toArray($request)
    {
        return [
            @if($status)
            'status' => true,
            @endif
            @if($length)
            'length' => $this->collection->count(),
            @endif
            'data' => $this->collection,
        ];
    }
}