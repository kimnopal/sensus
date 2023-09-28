<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\AkseptorKB;
use App\Models\Dusun;
use App\Models\HubunganKeluarga;
use App\Models\Individu;
use App\Models\RT;
use App\Models\RW;
use App\Models\Suku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.individu.index", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/create/deskripsi",
            "datas" => Individu::where("nik", "LIKE", "%$search%")->paginate(10),
        ]);
    }
}
