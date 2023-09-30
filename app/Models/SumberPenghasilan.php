<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SumberPenghasilan extends Model
{
    use HasFactory;

    protected $table = 'sumber_penghasilan';
    protected $guarded = ['id'];

    public function satuan(): BelongsTo
    {
        return $this->belongsTo(Satuan::class);
    }
}
