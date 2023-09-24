<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dusun extends Model
{
    use HasFactory;

    protected $table = 'dusun';
    protected $fillable = ['nama'];

    public function listKeluarga(): HasMany
    {
        return $this->hasMany(Keluarga::class);
    }
}
