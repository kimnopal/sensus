<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaPermukimanController extends Controller
{
    public function create(Keluarga $keluarga)
    {
        return view("pages.keluarga.permukiman.create", []);
    }
}
