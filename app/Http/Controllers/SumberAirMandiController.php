<?php

namespace App\Http\Controllers;

use App\Models\SumberAirMandi;
use Illuminate\Http\Request;

class SumberAirMandiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.sumber_air_mandi.index", [
            "type_menu" => "master_keluarga",
            "title" => "Sumber Air Mandi",
            "path" => "/sumber_air_mandi",
            "datas" => SumberAirMandi::where("sumber", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.sumber_air_mandi.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Sumber Air Mandi",
            "path" => "/sumber_air_mandi",
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

        SumberAirMandi::create($validatedData);

        return redirect("/sumber_air_mandi")->with("success-create", "Berhasil menambahkan data Sumber Air Mandi");
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
    public function edit(SumberAirMandi $sumberAirMandi)
    {
        return view("pages.master.keluarga.sumber_air_mandi.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Sumber Air Mandi",
            "path" => "/sumber_air_mandi",
            'data' => $sumberAirMandi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SumberAirMandi $sumberAirMandi)
    {
        $validatedData = $request->validate([
            "sumber" => "required|max:100"
        ]);

        SumberAirMandi::where("id", $sumberAirMandi->id)->update($validatedData);

        return redirect("/sumber_air_mandi")->with("success-update", "Berhasil memperbarui data Sumber Air Mandi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SumberAirMandi $sumberAirMandi)
    {
        $sumberAirMandi->destroy($sumberAirMandi->id);
        return redirect("/sumber_air_mandi")->with("success-delete", "Berhasil menghapus data Sumber Air Mandi");
    }
}
