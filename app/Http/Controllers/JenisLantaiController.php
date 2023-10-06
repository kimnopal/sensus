<?php

namespace App\Http\Controllers;

use App\Models\JenisLantai;
use Illuminate\Http\Request;

class JenisLantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.jenis_lantai.index", [
            "type_menu" => "master_keluarga",
            "title" => "Jenis Lantai",
            "path" => "/jenis_lantai",
            "datas" => JenisLantai::where("jenis", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.jenis_lantai.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Lantai",
            "path" => "/jenis_lantai",
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

        JenisLantai::create($validatedData);

        return redirect("/jenis_lantai")->with("success-create", "Berhasil menambahkan data Jenis Lantai");
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
    public function edit(JenisLantai $jenisLantai)
    {
        return view("pages.master.keluarga.jenis_lantai.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Lantai",
            "path" => "/jenis_lantai",
            'data' => $jenisLantai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisLantai $jenisLantai)
    {
        $validatedData = $request->validate([
            "jenis" => "required|max:100"
        ]);

        JenisLantai::where("id", $jenisLantai->id)->update($validatedData);

        return redirect("/jenis_lantai")->with("success-update", "Berhasil memperbarui data Jenis Lantai");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisLantai $jenisLantai)
    {
        $jenisLantai->destroy($jenisLantai->id);
        return redirect("/jenis_lantai")->with("success-delete", "Berhasil menghapus data Jenis Lantai");
    }
}
