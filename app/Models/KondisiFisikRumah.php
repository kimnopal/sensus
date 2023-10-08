<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KondisiFisikRumah extends Model
{
    use HasFactory;

    protected $table = "kondisi_fisik_rumah";
    protected $guarded = ["id"];

    public function permukiman_keluarga(): BelongsTo
    {
        return $this->belongsTo(PermukimanKeluarga::class);
    }
}
