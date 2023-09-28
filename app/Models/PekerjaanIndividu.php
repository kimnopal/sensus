<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanIndividu extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_individu';
    protected $guarded = ['id'];
}
