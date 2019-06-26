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

class {{ $name }}Collection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\{{ $name }}Resource';

    /**
    * Transform the resource collection into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function toArray($request)
    {
        $rules = [
@if($status)
            'status' => true,
@endif
@if($length)
            'length' => $this->collection->count(),
@endif
            'data' => $this->collection,
        ];

        return $rules;
    }
}
