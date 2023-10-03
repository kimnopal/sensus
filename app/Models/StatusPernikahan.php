<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusPernikahan extends Model
{
    use HasFactory;

    protected $table = "status_pernikahan";
    protected $guarded = ["id"];

    public function listPernikahan(): HasMany
    {
        return $this->hasMany(Pernikahan::class);
    }
}
