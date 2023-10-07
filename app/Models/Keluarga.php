<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $guarded = ['id'];

    public function dusun(): BelongsTo
    {
        return $this->belongsTo(Dusun::class);
    }

    public function rt(): BelongsTo
    {
        return $this->belongsTo(RT::class);
    }

    public function rw(): BelongsTo
    {
        return $this->belongsTo(RW::class);
    }

    public function permukiman_keluarga(): HasOne
    {
        return $this->hasOne(PermukimanKeluarga::class);
    }

    public function pendidikan_keluarga(): HasOne
    {
        return $this->hasOne(PendidikanKeluarga::class);
    }
}
