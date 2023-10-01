<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Individu extends Model
{
    use HasFactory;

    protected $table = 'individu';
    protected $guarded = ['id'];

    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class);
    }

    public function hubunganKeluargan(): BelongsTo
    {
        return $this->belongsTo(HubunganKeluarga::class);
    }

    public function akseptorKB(): BelongsTo
    {
        return $this->belongsTo(AkseptorKB::class);
    }

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, "no_kk", "no_kk");
    }

    public function pekerjaanIndividu(): HasOne
    {
        return $this->hasOne(PekerjaanIndividu::class);
    }
}
