<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SumberPenghasilan extends Model
{
    use HasFactory;

    protected $table = 'sumber_penghasilan';
    protected $guarded = ['id'];

    public function satuan(): BelongsTo
    {
        return $this->belongsTo(Satuan::class);
    }

    public function listPenghasilan(): HasMany
    {
        return $this->hasMany(Penghasilan::class);
    }
}
