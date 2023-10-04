<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataGuna extends Model
{
    use HasFactory;

    protected $table = 'tata_guna';
    protected $guarded = ['id'];
}
