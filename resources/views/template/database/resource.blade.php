<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 13/04/19
 * Time: 13:31
 */
?>

{{ '<?'.'php' }}

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class {{ $name }}Resource extends JsonResource
{
    /**
    * Get additional data that should be returned with the resource array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function with($request)
    {
        return [
            @if($status)
            'status' => true,
            @endif
            @if($length)
            'length' => 1,
            @endif
        ];
    }
}
