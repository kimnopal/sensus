<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AkseptorKB extends Model
{
    use HasFactory;

    protected $table = 'akseptor_kb';
    protected $guarded = ['id'];

    public function listIndividu(): HasMany
    {
        return $this->hasMany(Individu::class);
    }
}
