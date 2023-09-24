<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RW extends Model
{
    use HasFactory;

    protected $table = 'rw';
    protected $fillable = ['nomor'];

    public function listKeluarga(): HasMany
    {
        return $this->hasMany(Keluarga::class);
    }
}
