<?php

namespace App\Http\Controllers;

use App\Models\Suku;
use Illuminate\Http\Request;

class SukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.suku.index", [
            "type_menu" => "master",
            "title" => "Suku",
            "path" => "/suku",
            "datas" => Suku::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.suku.create", [
            "type_menu" => "master",
            "title" => "Suku",
            "path" => "/suku",
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

        Suku::create($validatedData);

        return redirect("/suku")->with("success-create", "Berhasil menambahkan data Suku");
    }

    /**
     * Display the specified resource.
     */
    public function show(Suku $suku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suku $suku)
    {
        return view("pages.master.suku.update", [
            "type_menu" => "master",
            "title" => "Suku",
            "path" => "/suku",
            "data" => $suku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suku $suku)
    {
        $validatedData = $request->validate([
            "nama" => "required"
        ]);

        Suku::where("id", $suku->id)->update($validatedData);

        return redirect("/suku")->with("success-update", "Berhasil memperbarui data Suku");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suku $suku)
    {
        $suku->destroy($suku->id);
        return redirect("/suku")->with("success-delete", "Berhasil menghapus data Suku");
    }
}
