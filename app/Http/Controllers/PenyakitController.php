<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        return view("pages.master.penyakit.index", [
            "type_menu" => "master",
            "title" => "Penyakit",
            "path" => "/penyakit",
            "datas" => Penyakit::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.penyakit.create", [
            "type_menu" => "master",
            "title" => "Penyakit",
            "path" => "/penyakit",
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

        Penyakit::create($validatedData);

        return redirect("/penyakit")->with("success-create", "Berhasil menambahkan data Penyakit");
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyakit $penyakit)
    {
        return view("pages.master.penyakit.update", [
            "type_menu" => "master",
            "title" => "Penyakit",
            "path" => "/penyakit",
            "data" => $penyakit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyakit $penyakit)
    {
        $validatedData = $request->validate([
            "nama" => "required"
        ]);

        Penyakit::where("id", $penyakit->id)->update($validatedData);

        return redirect("/penyakit")->with("success-update", "Berhasil memperbarui data Penyakit");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyakit $penyakit)
    {
        $penyakit->destroy($penyakit->id);
        return redirect("/penyakit")->with("success-delete", "Berhasil menghapus data Penyakit");
    }
}
