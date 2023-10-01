<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FrekuensiPerawatan extends Model
{
    use HasFactory;

    protected $table = 'frekuensi_perawatan';
    protected $guarded = ['id'];

    public function kesehatanIndividu(): BelongsTo
    {
        return $this->belongsTo(FrekuensiPerawatan::class);
    }
}
