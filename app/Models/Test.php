<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable  = [

    'test_id',
    'status',
    'name'
    ];
    use HasFactory;
}
