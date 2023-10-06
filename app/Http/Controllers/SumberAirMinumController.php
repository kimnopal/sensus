<?php

namespace App\Http\Controllers;

use App\Models\SumberAirMinum;
use Illuminate\Http\Request;

class SumberAirMinumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.sumber_air_minum.index", [
            "type_menu" => "master_keluarga",
            "title" => "Sumber Air Minum",
            "path" => "/sumber_air_minum",
            "datas" => SumberAirMinum::where("sumber", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.sumber_air_minum.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Sumber Air Minum",
            "path" => "/sumber_air_minum",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "sumber" => "required|max:100",
        ]);

        SumberAirMinum::create($validatedData);

        return redirect("/sumber_air_minum")->with("success-create", "Berhasil menambahkan data Sumber Air Minum");
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
    public function edit(SumberAirMinum $sumberAirMinum)
    {
        return view("pages.master.keluarga.sumber_air_minum.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Sumber Air Minum",
            "path" => "/sumber_air_minum",
            'data' => $sumberAirMinum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SumberAirMinum $sumberAirMinum)
    {
        $validatedData = $request->validate([
            "sumber" => "required|max:100"
        ]);

        SumberAirMinum::where("id", $sumberAirMinum->id)->update($validatedData);

        return redirect("/sumber_air_minum")->with("success-update", "Berhasil memperbarui data Sumber Air Minum");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SumberAirMinum $sumberAirMinum)
    {
        $sumberAirMinum->destroy($sumberAirMinum->id);
        return redirect("/sumber_air_minum")->with("success-delete", "Berhasil menghapus data Sumber Air Minum");
    }
}
