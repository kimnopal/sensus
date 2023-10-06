<?php

namespace App\Http\Controllers;

use App\Models\PembuanganLimbah;
use Illuminate\Http\Request;

class PembuanganLimbahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.pembuangan_limbah.index", [
            "type_menu" => "master_keluarga",
            "title" => "Pembuangan Limbah",
            "path" => "/pembuangan_limbah",
            "datas" => PembuanganLimbah::where("tempat", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.pembuangan_limbah.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Pembuangan Limbah",
            "path" => "/pembuangan_limbah",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "tempat" => "required|max:100",
        ]);

        PembuanganLimbah::create($validatedData);

        return redirect("/pembuangan_limbah")->with("success-create", "Berhasil menambahkan data Pembuangan Limbah");
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
    public function edit(PembuanganLimbah $pembuanganLimbah)
    {
        return view("pages.master.keluarga.pembuangan_limbah.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Pembuangan Limbah",
            "path" => "/pembuangan_limbah",
            'data' => $pembuanganLimbah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PembuanganLimbah $pembuanganLimbah)
    {
        $validatedData = $request->validate([
            "tempat" => "required|max:100"
        ]);

        PembuanganLimbah::where("id", $pembuanganLimbah->id)->update($validatedData);

        return redirect("/pembuangan_limbah")->with("success-update", "Berhasil memperbarui data Pembuangan Limbah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembuanganLimbah $pembuanganLimbah)
    {
        $pembuanganLimbah->destroy($pembuanganLimbah->id);
        return redirect("/pembuangan_limbah")->with("success-delete", "Berhasil menghapus data Pembuangan Limbah");
    }
}
