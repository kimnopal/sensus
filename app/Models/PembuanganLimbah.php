<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembuanganLimbah extends Model
{
    use HasFactory;

    protected $table = 'pembuangan_limbah';
    protected $guarded = ['id'];
}
