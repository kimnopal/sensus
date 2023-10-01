<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KesehatanIndividu extends Model
{
    use HasFactory;

    protected $table = 'kesehatan_individu';
    protected $guarded = ['id'];

    public function statusPenyakit(): HasMany
    {
        return $this->hasMany(StatusPenyakit::class);
    }

    public function frekuensiPerawatan(): HasMany
    {
        return $this->hasMany(FrekuensiPerawatan::class);
    }

    public function statusDisabilitas(): HasMany
    {
        return $this->hasMany(StatusDisabilitas::class);
    }
}
