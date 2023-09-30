<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        return view("pages.master.satuan.index", [
            "type_menu" => "master",
            "title" => "Satuan",
            "path" => "/satuan",
            "datas" => Satuan::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.satuan.create", [
            'type_menu' => 'master',
            'title' => "Satuan",
            'path' => "/satuan",
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

        Satuan::create($validatedData);

        return redirect("/satuan")->with("success-create", "Berhasil menambahkan data Satuan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view("pages.master.satuan.update", [
            'type_menu' => 'master',
            'title' => "Satuan",
            'path' => "/satuan",
            'data' => $satuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255"
        ]);

        Satuan::where("id", $satuan->id)->update($validatedData);

        return redirect("/satuan")->with("success-update", "Berhasil memperbarui data Satuan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->destroy($satuan->id);
        return redirect("/satuan")->with("success-delete", "Berhasil menghapus data Satuan");
    }
}
