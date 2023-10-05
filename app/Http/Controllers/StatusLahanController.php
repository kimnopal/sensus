<?php

namespace App\Http\Controllers;

use App\Models\StatusLahan;
use Illuminate\Http\Request;

class StatusLahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.status_lahan.index", [
            "type_menu" => "master_keluarga",
            "title" => "Status Lahan",
            "path" => "/status_lahan",
            "datas" => StatusLahan::where("status", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.status_lahan.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Status Lahan",
            "path" => "/status_lahan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "status" => "required|max:100",
        ]);

        StatusLahan::create($validatedData);

        return redirect("/status_lahan")->with("success-create", "Berhasil menambahkan data Status Lahan");
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
    public function edit(StatusLahan $statusLahan)
    {
        return view("pages.master.keluarga.status_lahan.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Status Lahan",
            "path" => "/status_lahan",
            'data' => $statusLahan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusLahan $statusLahan)
    {
        $validatedData = $request->validate([
            "status" => "required|max:100"
        ]);

        StatusLahan::where("id", $statusLahan->id)->update($validatedData);

        return redirect("/status_lahan")->with("success-update", "Berhasil memperbarui data Status Lahan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusLahan $statusLahan)
    {
        $statusLahan->destroy($statusLahan->id);
        return redirect("/status_lahan")->with("success-delete", "Berhasil menghapus data Status Lahan");
    }
}
