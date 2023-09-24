<?php

namespace App\Http\Controllers;

use App\Models\HubunganKeluarga;
use Illuminate\Http\Request;

class HubunganKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.hubungan_keluarga.index", [
            "type_menu" => "master",
            "title" => "Hubungan Keluarga",
            "path" => "/hubungan_keluarga",
            "datas" => HubunganKeluarga::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.hubungan_keluarga.create", [
            "type_menu" => "master",
            "title" => "Hubungan Keluarga",
            "path" => "/hubungan_keluarga",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => "required",
        ]);

        HubunganKeluarga::create($validatedData);

        return redirect("/hubungan_keluarga")->with("success-create", "Berhasil menambahkan data Hubungan Keluarga");
    }

    /**
     * Display the specified resource.
     */
    public function show(HubunganKeluarga $hubunganKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HubunganKeluarga $hubunganKeluarga)
    {
        return view("pages.master.hubungan_keluarga.update", [
            "type_menu" => "master",
            "title" => "Hubungan Keluarga",
            "path" => "/hubungan_keluarga",
            "data" => $hubunganKeluarga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HubunganKeluarga $hubunganKeluarga)
    {
        $validatedData = $request->validate([
            "nama" => "required"
        ]);

        HubunganKeluarga::where("id", $hubunganKeluarga->id)->update($validatedData);

        return redirect("/hubungan_keluarga")->with("success-update", "Berhasil memperbarui data Hubungan Keluarga");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HubunganKeluarga $hubunganKeluarga)
    {
        $hubunganKeluarga->destroy($hubunganKeluarga->id);
        return redirect("/hubungan_keluarga")->with("success-delete", "Berhasil menghapus data Hubungan Keluarga");
    }
}
