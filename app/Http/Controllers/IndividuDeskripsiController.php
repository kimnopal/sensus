<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\AkseptorKB;
use App\Models\HubunganKeluarga;
use App\Models\Suku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividuDeskripsiController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.individu.deskripsi.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/deskripsi",
            "dataStatusPernikahan" => DB::table("status_pernikahan")->get(),
            "dataAgama" => Agama::all(),
            "dataHubunganKeluarga" => HubunganKeluarga::all(),
            "dataAkseptorKB" => AkseptorKB::all(),
            "dataSuku" => Suku::all(),
        ]);
    }

    public function store(Request $request)
    {
        return to_route("individu.pekerjaan.create");
    }
}
