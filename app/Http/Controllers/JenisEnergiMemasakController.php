<?php

namespace App\Http\Controllers;

use App\Models\JenisEnergiMemasak;
use Illuminate\Http\Request;

class JenisEnergiMemasakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.jenis_energi_memasak.index", [
            "type_menu" => "master_keluarga",
            "title" => "Jenis Energi Memasak",
            "path" => "/jenis_energi_memasak",
            "datas" => JenisEnergiMemasak::where("jenis", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.jenis_energi_memasak.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Energi Memasak",
            "path" => "/jenis_energi_memasak",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "jenis" => "required|max:100",
        ]);

        JenisEnergiMemasak::create($validatedData);

        return redirect("/jenis_energi_memasak")->with("success-create", "Berhasil menambahkan data Jenis Energi Memasak");
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
    public function edit(JenisEnergiMemasak $jenisEnergiMemasak)
    {
        return view("pages.master.keluarga.jenis_energi_memasak.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Energi Memasak",
            "path" => "/jenis_energi_memasak",
            'data' => $jenisEnergiMemasak,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisEnergiMemasak $jenisEnergiMemasak)
    {
        $validatedData = $request->validate([
            "jenis" => "required|max:100"
        ]);

        JenisEnergiMemasak::where("id", $jenisEnergiMemasak->id)->update($validatedData);

        return redirect("/jenis_energi_memasak")->with("success-update", "Berhasil memperbarui data Jenis Energi Memasak");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisEnergiMemasak $jenisEnergiMemasak)
    {
        $jenisEnergiMemasak->destroy($jenisEnergiMemasak->id);
        return redirect("/jenis_energi_memasak")->with("success-delete", "Berhasil menghapus data Jenis Energi Memasak");
    }
}
