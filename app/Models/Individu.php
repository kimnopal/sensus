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

    // data master
    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class);
    }

    public function hubungan_keluarga(): BelongsTo
    {
        return $this->belongsTo(HubunganKeluarga::class);
    }

    public function akseptor_kb(): BelongsTo
    {
        return $this->belongsTo(AkseptorKB::class);
    }

    public function pernikahan(): HasOne
    {
        return $this->hasOne(Pernikahan::class);
    }

    public function administrasi_kependudukan(): HasOne
    {
        return $this->hasOne(AdministrasiKependudukan::class);
    }


    // data utama
    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, "no_kk", "no_kk");
    }

    public function pekerjaan_individu(): HasOne
    {
        return $this->hasOne(PekerjaanIndividu::class);
    }

    public function kesehatan_individu(): HasOne
    {
        return $this->hasOne(KesehatanIndividu::class);
    }

    public function pendidikan_individu(): HasOne
    {
        return $this->hasOne(PendidikanIndividu::class);
    }
}
