<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KesehatanIndividu extends Model
{
    use HasFactory;

    protected $table = 'kesehatan_individu';
    protected $guarded = ['id'];

    public function individu(): BelongsTo
    {
        return $this->belongsTo(Individu::class);
    }

    public function list_status_penyakit(): HasMany
    {
        return $this->hasMany(StatusPenyakit::class);
    }

    public function list_frekuensi_perawatan(): HasMany
    {
        return $this->hasMany(FrekuensiPerawatan::class);
    }

    public function list_status_disabilitas(): HasMany
    {
        return $this->hasMany(StatusDisabilitas::class);
    }
}
