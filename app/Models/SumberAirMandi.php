<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberAirMandi extends Model
{
    use HasFactory;

    protected $table = 'sumber_air_mandi';
    protected $guarded = ['id'];
}
