<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusPenyakit extends Model
{
    use HasFactory;

    protected $table = 'status_penyakit';
    protected $guarded = ['id'];

    public function kesehatanIndividu(): BelongsTo
    {
        return $this->belongsTo(KesehatanIndividu::class);
    }
}
