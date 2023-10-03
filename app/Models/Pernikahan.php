<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pernikahan extends Model
{
    use HasFactory;

    protected $table = "pernikahan";
    protected $guarded = ["id"];

    public function individu(): BelongsTo
    {
        return $this->belongsTo(Individu::class);
    }

    public function status_pernikahan(): BelongsTo
    {
        return $this->belongsTo(StatusPernikahan::class);
    }
}
