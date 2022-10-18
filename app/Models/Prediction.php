<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = [
        'prediction_id',
        'name',
        'league'

    ];
    use HasFactory;
}
