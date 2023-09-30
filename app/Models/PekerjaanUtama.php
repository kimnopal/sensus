<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanUtama extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_utama';
    protected $fillable = ['nama'];
}
