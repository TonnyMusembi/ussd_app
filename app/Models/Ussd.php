<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ussd extends Model
{
    protected $fillable = [
        'ussd_id',
        'type' ];
    use HasFactory;
}
