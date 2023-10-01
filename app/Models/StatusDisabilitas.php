<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusDisabilitas extends Model
{
    use HasFactory;

    protected $table = "status_disabilitas";
    protected $guarded = ["id"];

    public function kesehatanIndividu(): BelongsTo
    {
        return $this->belongsTo(StatusDisabilitas::class);
    }
}
