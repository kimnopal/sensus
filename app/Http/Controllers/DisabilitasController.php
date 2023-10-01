<?php

namespace App\Http\Controllers;

use App\Models\Disabilitas;
use Illuminate\Http\Request;

class DisabilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        return view("pages.master.disabilitas.index", [
            "type_menu" => "master",
            "title" => "Disabilitas",
            "path" => "/disabilitas",
            "datas" => Disabilitas::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.disabilitas.create", [
            "type_menu" => "master",
            "title" => "Disabilitas",
            "path" => "/disabilitas",
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

        Disabilitas::create($validatedData);

        return redirect("/disabilitas")->with("success-create", "Berhasil menambahkan data Disabilitas");
    }

    /**
     * Display the specified resource.
     */
    public function show(Disabilitas $disabilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disabilitas $disabilitas)
    {
        return view("pages.master.disabilitas.update", [
            "type_menu" => "master",
            "title" => "Disabilitas",
            "path" => "/Disabilitas",
            "data" => $disabilitas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disabilitas $disabilitas)
    {
        $validatedData = $request->validate([
            "nama" => "required"
        ]);

        Disabilitas::where("id", $disabilitas->id)->update($validatedData);

        return redirect("/disabilitas")->with("success-update", "Berhasil memperbarui data Disabilitas");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disabilitas $disabilitas)
    {
        $disabilitas->destroy($disabilitas->id);
        return redirect("/disabilitas")->with("success-delete", "Berhasil menghapus data Disabilitas");
    }
}
