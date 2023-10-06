<?php

namespace App\Http\Controllers;

use App\Models\JenisDinding;
use Illuminate\Http\Request;

class JenisDindingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.jenis_dinding.index", [
            "type_menu" => "master_keluarga",
            "title" => "Jenis Dinding",
            "path" => "/jenis_dinding",
            "datas" => JenisDinding::where("jenis", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.jenis_dinding.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Dinding",
            "path" => "/jenis_dinding",
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

        JenisDinding::create($validatedData);

        return redirect("/jenis_dinding")->with("success-create", "Berhasil menambahkan data Jenis Dinding");
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
    public function edit(JenisDinding $jenisDinding)
    {
        return view("pages.master.keluarga.jenis_dinding.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Jenis Dinding",
            "path" => "/jenis_dinding",
            'data' => $jenisDinding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisDinding $jenisDinding)
    {
        $validatedData = $request->validate([
            "jenis" => "required|max:100"
        ]);

        JenisDinding::where("id", $jenisDinding->id)->update($validatedData);

        return redirect("/jenis_dinding")->with("success-update", "Berhasil memperbarui data Jenis Dinding");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisDinding $jenisDinding)
    {
        $jenisDinding->destroy($jenisDinding->id);
        return redirect("/jenis_dinding")->with("success-delete", "Berhasil menghapus data Jenis Dinding");
    }
}
