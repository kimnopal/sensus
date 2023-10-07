<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TujuanTransportasi extends Model
{
    use HasFactory;

    protected $table = "tujuan_transportasi";
    protected $guarded = ["id"];

    public function list_sarana_prasarana_transportasi(): HasMany
    {
        return $this->hasMany(SaranaPrasaranaTransportasi::class);
    }
}
