<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PekerjaanUtama extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_utama';
    protected $fillable = ['nama'];

    public function listPekerjaanIndividu(): HasMany
    {
        return $this->hasMany(PekerjaanIndividu::class);
    }
}
