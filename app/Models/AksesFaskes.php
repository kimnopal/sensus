<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AksesFaskes extends Model
{
    use HasFactory;

    protected $table = "akses_faskes";
    protected $guarded = ["id"];

    public function kesehatan_keluarga(): BelongsTo
    {
        return $this->belongsTo(KesehatanKeluarga::class);
    }

    public function jenis_faskes(): BelongsTo
    {
        return $this->belongsTo(JenisFaskes::class);
    }
}
