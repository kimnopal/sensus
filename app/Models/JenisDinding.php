<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDinding extends Model
{
    use HasFactory;

    protected $table = "jenis_dinding";
    protected $guarded = ["id"];
}
