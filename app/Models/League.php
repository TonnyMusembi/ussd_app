<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = [
        'league_id',
        'name',
        'country'
    ];
    use HasFactory;
}
