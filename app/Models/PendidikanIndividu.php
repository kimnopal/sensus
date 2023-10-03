<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendidikanIndividu extends Model
{
    use HasFactory;

    protected $table = "pendidikan_individu";
    protected $guarded = ["id"];

    public function individu(): BelongsTo
    {
        return $this->belongsTo(Individu::class);
    }

    public function tingkatPendidikan(): BelongsTo
    {
        return $this->belongsTo(TingkatPendidikan::class);
    }

    public function pendidikanAktif(): BelongsTo
    {
        return $this->belongsTo(PendidikanAktif::class);
    }
}
