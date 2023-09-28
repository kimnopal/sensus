<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividuPendidikanController extends Controller
{
    public function create()
    {
        return view("pages.individu.pendidikan.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/pendidikan",
        ]);
    }
}
