<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PendidikanKeluarga extends Model
{
    use HasFactory;

    protected $table = "pendidikan_keluarga";
    protected $guarded = ["id"];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }

    public function list_akses_pendidikan(): HasMany
    {
        return $this->hasMany(AksesPendidikan::class);
    }
}
