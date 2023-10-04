<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAtap extends Model
{
    use HasFactory;

    protected $table = "jenis_atap";
    protected $guarded = ["id"];
}
