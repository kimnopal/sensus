<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AksesTenagaKesehatan extends Model
{
    use HasFactory;

    protected $table = "akses_tenaga_kesehatan";
    protected $guarded =  ["id"];

    public function kesehatan_keluarga(): BelongsTo
    {
        return $this->belongsTo(KesehatanKeluarga::class);
    }

    public function jenis_tenaga_kesehatan(): BelongsTo
    {
        return $this->belongsTo(JenisTenagaKesehatan::class);
    }
}
