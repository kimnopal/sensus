<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberAirMinum extends Model
{
    use HasFactory;

    protected $table = 'sumber_air_minum';
    protected $guarded = ['id'];
}
