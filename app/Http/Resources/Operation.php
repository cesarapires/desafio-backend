<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Operation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'operation_id'=>$this->operation_id,
            'user_id'=>$this->user_id,
            'type'=>$this->type,
            'value'=>$this->value,
            'cpf'=>$this->cpf,

            'balance'=>$this->balance,

            'email'=>$this->email
        ];
    }
}
