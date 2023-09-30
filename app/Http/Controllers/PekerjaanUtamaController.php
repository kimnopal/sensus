<?php

namespace App\Http\Controllers;

use App\Models\PekerjaanUtama;
use Illuminate\Http\Request;

class PekerjaanUtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        return view("pages.master.pekerjaan_utama.index", [
            "type_menu" => "master",
            "title" => "Pekerjaan Utama",
            "path" => "/pekerjaan_utama",
            "datas" => PekerjaanUtama::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.pekerjaan_utama.create", [
            'type_menu' => 'master',
            'title' => "Pekerjaan Utama",
            'path' => "/pekerjaan_utama",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:100",
        ]);

        PekerjaanUtama::create($validatedData);

        return redirect("/pekerjaan_utama")->with("success-create", "Berhasil menambahkan data Pekerjaan Utama");
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
    public function edit(PekerjaanUtama $pekerjaanUtama)
    {
        return view("pages.master.pekerjaan_utama.update", [
            'type_menu' => 'master',
            'title' => "Pekerjaan Utama",
            'path' => "/pekerjaan_utama",
            'data' => $pekerjaanUtama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PekerjaanUtama $pekerjaanUtama)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255"
        ]);

        PekerjaanUtama::where("id", $pekerjaanUtama->id)->update($validatedData);

        return redirect("/pekerjaan_utama")->with("success-update", "Berhasil memperbarui data Pekerjaan Utama");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PekerjaanUtama $pekerjaanUtama)
    {
        $pekerjaanUtama->destroy($pekerjaanUtama->id);
        return redirect("/pekerjaan_utama")->with("success-delete", "Berhasil menghapus data Pekerjaan Utama");
    }
}
