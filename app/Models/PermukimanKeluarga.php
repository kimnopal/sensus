<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermukimanKeluarga extends Model
{
    use HasFactory;

    protected $table = "permukiman_keluarga";
    protected $guarded = ["id"];
}
