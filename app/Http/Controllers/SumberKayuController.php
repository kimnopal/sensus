<?php

namespace App\Http\Controllers;

use App\Models\SumberKayu;
use Illuminate\Http\Request;

class SumberKayuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.sumber_kayu.index", [
            "type_menu" => "master_keluarga",
            "title" => "Sumber Kayu",
            "path" => "/sumber_kayu",
            "datas" => SumberKayu::where("sumber", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.sumber_kayu.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Sumber Kayu",
            "path" => "/sumber_kayu",
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

        SumberKayu::create($validatedData);

        return redirect("/sumber_kayu")->with("success-create", "Berhasil menambahkan data Sumber Kayu");
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
    public function edit(SumberKayu $sumberKayu)
    {
        return view("pages.master.keluarga.sumber_kayu.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Sumber Kayu",
            "path" => "/sumber_kayu",
            'data' => $sumberKayu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SumberKayu $sumberKayu)
    {
        $validatedData = $request->validate([
            "sumber" => "required|max:100"
        ]);

        SumberKayu::where("id", $sumberKayu->id)->update($validatedData);

        return redirect("/sumber_kayu")->with("success-update", "Berhasil memperbarui data Sumber Kayu");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SumberKayu $sumberKayu)
    {
        $sumberKayu->destroy($sumberKayu->id);
        return redirect("/sumber_kayu")->with("success-delete", "Berhasil menghapus data Sumber Kayu");
    }
}
