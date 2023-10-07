<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaKesehatanController extends Controller
{
    public function create(Keluarga $keluarga)
    {
        return view("pages.keluarga.kesehatan.create");
    }
}
