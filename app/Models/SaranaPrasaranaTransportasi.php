<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaranaPrasaranaTransportasi extends Model
{
    use HasFactory;

    protected $table = "sarana_prasarana_transportasi";
    protected $guarded = ["id"];

    public function kesehatan_keluarga(): BelongsTo
    {
        return $this->belongsTo(KesehatanKeluarga::class);
    }

    public function tujuan_transportasi(): BelongsTo
    {
        return $this->belongsTo(TujuanTransportasi::class);
    }
}
