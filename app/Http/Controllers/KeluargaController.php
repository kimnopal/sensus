<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Keluarga;
use App\Models\RT;
use App\Models\RW;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.keluarga.index", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga",
            "datas" => Keluarga::with(["dusun", "rt", "rw"])->where("no_kk", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.keluarga.create", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga",
            "dataDusun" => Dusun::all(),
            "dataRT" => RT::all(),
            "dataRW" => RW::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "no_kk" => "required|unique:keluarga,no_kk",
            "dusun_id" => "integer|nullable|exists:dusun,id",
            "rt_id" => "integer|nullable|exists:rt,id",
            "rw_id" => "integer|nullable|exists:rw,id",
        ]);

        $validatedData["provinsi"] = "jawa barat";
        $validatedData["kabupaten"] = "pangandaran";
        $validatedData["kecamatan"] = "cijulang";
        $validatedData["desa"] = "batukaras";

        Keluarga::create($validatedData);

        return redirect("/keluarga")->with("success-create", "Berhasil menambahkan data Keluarga");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keluarga $keluarga)
    {
        return view("pages.keluarga.update", [
            'type_menu' => '',
            "title" => "Keluarga",
            "path" => "/keluarga",
            "data" => $keluarga,
            "dataDusun" => Dusun::all(),
            "dataRT" => RT::all(),
            "dataRW" => RW::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        $rules = [
            "dusun_id" => "integer|nullable|exists:dusun,id",
            "rt_id" => "integer|nullable|exists:rt,id",
            "rw_id" => "integer|nullable|exists:rw,id",
        ];

        if ($keluarga->no_kk != $request->input("no_kk")) {
            $rules["no_kk"] = "required|unique:keluarga,no_kk";
        }

        $validatedData = $request->validate($rules);

        Keluarga::where("id", $keluarga->id)->update($validatedData);

        return redirect("/keluarga")->with("success-update", "Berhasil memperbarui data Keluarga");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keluarga $keluarga)
    {
        $keluarga->destroy($keluarga->id);
        return redirect("/keluarga")->with("success-delete", "Berhasil menghapus data Keluarga");
    }
}
