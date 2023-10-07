<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisTenagaKesehatan extends Model
{
    use HasFactory;

    protected $table = "jenis_tenaga_kesehatan";
    protected $guarded = ["id"];

    public function list_akses_tenaga_kesehatan(): HasMany
    {
        return $this->hasMany(AksesTenagaKesehatan::class);
    }
}
