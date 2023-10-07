<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AksesPendidikan extends Model
{
    use HasFactory;

    protected $table = "akses_pendidikan";
    protected $guarded = ["id"];

    public function pendidikan_keluarga(): BelongsTo
    {
        return $this->belongsTo(PendidikanKeluarga::class);
    }

    public function jenis_pendidikan(): BelongsTo
    {
        return $this->belongsTo(JenisPendidikan::class);
    }
}
