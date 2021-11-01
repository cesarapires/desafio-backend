<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'idUser'=>$this->idUser,
            'name'=>$this->name,
            'birthday'=>$this->birthday,
            'cpf'=>$this->cpf,

            'balance'=>$this->balance,

            'email'=>$this->email
        ];
    }
}
