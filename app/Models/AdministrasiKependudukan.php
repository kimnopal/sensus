<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdministrasiKependudukan extends Model
{
    use HasFactory;

    protected $table = "administrasi_kependudukan";
    protected $guarded = ["id"];

    public function individu(): BelongsTo
    {
        return $this->belongsTo(Individu::class);
    }
}
