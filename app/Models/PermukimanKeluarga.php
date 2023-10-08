<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PermukimanKeluarga extends Model
{
    use HasFactory;

    protected $table = "permukiman_keluarga";
    protected $guarded = ["id"];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }

    public function list_kondisi_fisik_rumah(): HasMany
    {
        return $this->hasMany(KondisiFisikRumah::class);
    }
}
