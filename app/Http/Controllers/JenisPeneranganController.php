<?php

namespace App\Http\Controllers;

use App\Models\JenisPenerangan;
use Illuminate\Http\Request;

class JenisPeneranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.jenis_penerangan.index", [
            "type_menu" => "master_keluarga",
            "title" => "Jenis Penerangan",
            "path" => "/jenis_penerangan",
            "datas" => JenisPenerangan::where("jenis", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.jenis_penerangan.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Penerangan",
            "path" => "/jenis_penerangan",
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

        JenisPenerangan::create($validatedData);

        return redirect("/jenis_penerangan")->with("success-create", "Berhasil menambahkan data Jenis Penerangan");
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
    public function edit(JenisPenerangan $jenisPenerangan)
    {
        return view("pages.master.keluarga.jenis_penerangan.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Penerangan",
            "path" => "/jenis_penerangan",
            'data' => $jenisPenerangan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPenerangan $jenisPenerangan)
    {
        $validatedData = $request->validate([
            "jenis" => "required|max:100"
        ]);

        JenisPenerangan::where("id", $jenisPenerangan->id)->update($validatedData);

        return redirect("/jenis_penerangan")->with("success-update", "Berhasil memperbarui data Jenis Penerangan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPenerangan $jenisPenerangan)
    {
        $jenisPenerangan->destroy($jenisPenerangan->id);
        return redirect("/jenis_penerangan")->with("success-delete", "Berhasil menghapus data Jenis Penerangan");
    }
}
