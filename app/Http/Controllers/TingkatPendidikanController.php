<?php

namespace App\Http\Controllers;

use App\Models\TingkatPendidikan;
use Illuminate\Http\Request;

class TingkatPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.tingkat_pendidikan.index", [
            "type_menu" => "master",
            "title" => "Tingkat Pendidikan",
            "path" => "/tingkat_pendidikan",
            "datas" => TingkatPendidikan::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.tingkat_pendidikan.create", [
            "type_menu" => "master",
            "title" => "Tingkat Pendidikan",
            "path" => "/tingkat_pendidikan",
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

        TingkatPendidikan::create($validatedData);

        return redirect("/tingkat_pendidikan")->with("success-create", "Berhasil menambahkan data Tingkat Pendidikan");
    }

    /**
     * Display the specified resource.
     */
    public function show(TingkatPendidikan $tingkatPendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TingkatPendidikan $tingkatPendidikan)
    {
        dd($tingkatPendidikan);
        return view("pages.master.tingkat_pendidikan.update", [
            "type_menu" => "master",
            "title" => "Tingkat Pendidikan",
            "path" => "/tingkat_pendidikan",
            "data" => $tingkatPendidikan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TingkatPendidikan $tingkatPendidikan)
    {
        $validatedData = $request->validate([
            "nama" => "required"
        ]);

        TingkatPendidikan::where("id", $tingkatPendidikan->id)->update($validatedData);

        return redirect("/tingkat_pendidikan")->with("success-update", "Berhasil memperbarui data Tingkat Pendidikan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TingkatPendidikan $tingkatPendidikan)
    {
        $tingkatPendidikan->destroy($tingkatPendidikan->id);
        return redirect("/tingkat_pendidikan")->with("success-delete", "Berhasil menghapus data Tingkat Pendidikan");
    }
}
