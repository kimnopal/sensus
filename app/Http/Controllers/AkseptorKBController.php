<?php

namespace App\Http\Controllers;

use App\Models\AkseptorKB;
use Illuminate\Http\Request;

class AkseptorKBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.akseptor_kb.index", [
            "type_menu" => "master",
            "title" => "Akseptor KB",
            "path" => "/akseptor_kb",
            "datas" => AkseptorKB::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.akseptor_kb.create", [
            "type_menu" => "master",
            "title" => "Akseptor KB",
            "path" => "/akseptor_kb",
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

        AkseptorKB::create($validatedData);

        return redirect("/akseptor_kb")->with("success-create", "Berhasil menambahkan data Akseptor KB");
    }

    /**
     * Display the specified resource.
     */
    public function show(AkseptorKB $akseptorKB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AkseptorKB $akseptorKB)
    {
        return view("pages.master.akseptor_kb.update", [
            "type_menu" => "master",
            "title" => "Akseptor KB",
            "path" => "/akseptor_kb",
            "data" => $akseptorKB,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AkseptorKB $akseptorKB)
    {
        $validatedData = $request->validate([
            "nama" => "required"
        ]);

        AkseptorKB::where("id", $akseptorKB->id)->update($validatedData);

        return redirect("/akseptor_kb")->with("success-update", "Berhasil memperbarui data Akseptor KB");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AkseptorKB $akseptorKB)
    {
        $akseptorKB->destroy($akseptorKB->id);
        return redirect("/akseptor_kb")->with("success-delete", "Berhasil menghapus data Akseptor KB");
    }
}
