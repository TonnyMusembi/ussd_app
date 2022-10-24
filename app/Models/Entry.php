<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected  $fillable = [
        'id',
        'status_id',
        'name'

    ];
    use HasFactory;
}
