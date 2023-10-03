<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PekerjaanIndividu extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_individu';
    protected $guarded = ['id'];

    public function individu(): BelongsTo
    {
        return $this->belongsTo(Individu::class);
    }

    public function pekerjaanUtama(): BelongsTo
    {
        return $this->belongsTo(PekerjaanUtama::class);
    }

    public function list_penghasilan(): HasMany
    {
        return $this->hasMany(Penghasilan::class);
    }
}
