<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.agama.index", [
            "type_menu" => "master",
            "title" => "Agama",
            "path" => "/agama",
            "datas" => Agama::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.agama.create", [
            'type_menu' => 'master',
            "title" => "Agama",
            "path" => "/agama",
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

        Agama::create($validatedData);

        return redirect("/agama")->with("success-create", "Berhasil menambahkan data Agama");
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
    public function edit(Agama $agama)
    {
        return view("pages.master.agama.update", [
            'type_menu' => 'master',
            "title" => "Agama",
            "path" => "/agama",
            'data' => $agama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agama $agama)
    {
        $validatedData = $request->validate([
            "nama" => "required"
        ]);

        Agama::where("id", $agama->id)->update($validatedData);

        return redirect("/agama")->with("success-update", "Berhasil memperbarui data Agama");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agama $agama)
    {
        $agama->destroy($agama->id);
        return redirect("/agama")->with("success-delete", "Berhasil menghapus data Agama");
    }
}
