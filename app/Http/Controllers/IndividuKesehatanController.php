<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividuKesehatanController extends Controller
{
    public function create()
    {
        return view("pages.individu.kesehatan.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/kesehatan",
        ]);
    }

    public function store(Request $request)
    {
        return to_route("individu.pendidikan.create");
    }
}
