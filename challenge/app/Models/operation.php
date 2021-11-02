<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class operation extends Model
{
    protected $fillable = [
        'operation_id',
        'user_id',
        'value',
        'type',
        'created_At',
        'updated_At'
    ];
}
