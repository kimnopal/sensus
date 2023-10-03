<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TingkatPendidikan extends Model
{
    use HasFactory;

    protected $table = "tingkat_pendidikan";
    protected $guarded = ["id"];

    public function listPendidikanIndividu(): HasMany
    {
        return $this->hasMany(PendidikanIndividu::class);
    }
}
