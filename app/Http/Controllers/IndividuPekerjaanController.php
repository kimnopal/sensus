<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividuPekerjaanController extends Controller
{
    public function create()
    {
        return view("pages.individu.pekerjaan.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/pekerjaan",
        ]);
    }

    public function store(Request $request)
    {
        return to_route("individu.kesehatan.create");
    }
}
