<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KesehatanKeluarga extends Model
{
    use HasFactory;

    protected $table = "kesehatan_keluarga";
    protected $guarded = ["id"];

    public function list_akses_faskes(): HasMany
    {
        return $this->hasMany(AksesFaskes::class);
    }

    public function list_sarana_prasarana_transportasi(): HasMany
    {
        return $this->hasMany(SaranaPrasaranaTransportasi::class);
    }

    public function list_akses_tenaga_kesehatan(): HasMany
    {
        return $this->hasMany(AksesTenagaKesehatan::class);
    }
}
