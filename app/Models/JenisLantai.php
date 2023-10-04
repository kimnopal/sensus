<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLantai extends Model
{
    use HasFactory;

    protected $table = "jenis_lantai";
    protected $guarded = ["id"];
}
