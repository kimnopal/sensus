<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PendidikanAktif extends Model
{
    use HasFactory;

    protected $table = "pendidikan_aktif";
    protected $guarded = ["id"];

    public function listPendidikanIndividu(): HasMany
    {
        return $this->hasMany(PendidikanIndividu::class);
    }
}
