<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penghasilan extends Model
{
    use HasFactory;

    protected $table = 'penghasilan';
    protected $guarded = ['id'];

    public function pekerjaanIndividu(): BelongsTo
    {
        return $this->belongsTo(PekerjaanIndividu::class);
    }

    public function sumberPenghasilan(): BelongsTo
    {
        return $this->belongsTo(SumberPenghasilan::class);
    }
}
