<?php

namespace App\Http\Controllers;

use App\Models\JenisAtap;
use Illuminate\Http\Request;

class JenisAtapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.jenis_atap.index", [
            "type_menu" => "master_keluarga",
            "title" => "Jenis Atap",
            "path" => "/jenis_atap",
            "datas" => JenisAtap::where("jenis", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.jenis_atap.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Atap",
            "path" => "/jenis_atap",
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

        JenisAtap::create($validatedData);

        return redirect("/jenis_atap")->with("success-create", "Berhasil menambahkan data Jenis Atap");
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
    public function edit(JenisAtap $jenisAtap)
    {
        return view("pages.master.keluarga.jenis_atap.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Atap",
            "path" => "/jenis_atap",
            'data' => $jenisAtap,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisAtap $jenisAtap)
    {
        $validatedData = $request->validate([
            "jenis" => "required|max:100"
        ]);

        JenisAtap::where("id", $jenisAtap->id)->update($validatedData);

        return redirect("/jenis_atap")->with("success-update", "Berhasil memperbarui data Jenis Atap");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisAtap $jenisAtap)
    {
        $jenisAtap->destroy($jenisAtap->id);
        return redirect("/jenis_atap")->with("success-delete", "Berhasil menghapus data Jenis Atap");
    }
}
