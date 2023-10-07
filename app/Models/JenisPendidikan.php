<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisPendidikan extends Model
{
    use HasFactory;

    protected $table = "jenis_pendidikan";
    protected $guarded = ["id"];

    public function list_akses_pendidikan(): HasMany
    {
        return $this->hasMany(AksesPendidikan::class);
    }
}
