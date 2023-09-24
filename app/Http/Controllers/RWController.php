<?php

namespace App\Http\Controllers;

use App\Models\RW;
use Illuminate\Http\Request;

class RWController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.rw.index", [
            "type_menu" => "master",
            "title" => "RW",
            "path" => "/rw",
            "datas" => RW::where("nomor", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.rw.create", [
            'type_menu' => 'master',
            "title" => "RW",
            "path" => "/rw",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nomor" => "required",
        ]);

        RW::create($validatedData);

        return redirect("/rw")->with("success-create", "Berhasil menambahkan data RW");
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
    public function edit(RW $rw)
    {
        return view("pages.master.rw.update", [
            'type_menu' => 'master',
            "title" => "RW",
            "path" => "/rw",
            'data' => $rw,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RW $rw)
    {
        $validatedData = $request->validate([
            "nomor" => "required"
        ]);

        RW::where("id", $rw->id)->update($validatedData);

        return redirect("/rw")->with("success-update", "Berhasil memperbarui data RW");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RW $rw)
    {
        $rw->destroy($rw->id);
        return redirect("/rw")->with("success-delete", "Berhasil menghapus data RW");
    }
}
