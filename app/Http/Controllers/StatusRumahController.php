<?php

namespace App\Http\Controllers;

use App\Models\StatusRumah;
use Illuminate\Http\Request;

class StatusRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.master.keluarga.status_rumah.index", [
            "type_menu" => "master_keluarga",
            "title" => "Status Rumah",
            "path" => "/status_rumah",
            "datas" => StatusRumah::where("status", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.keluarga.status_rumah.create", [
            'type_menu' => 'master_keluarga',
            "title" => "Status Rumah",
            "path" => "/status_rumah",
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

        StatusRumah::create($validatedData);

        return redirect("/status_rumah")->with("success-create", "Berhasil menambahkan data Status Rumah");
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
    public function edit(StatusRumah $statusRumah)
    {
        return view("pages.master.keluarga.status_rumah.update", [
            'type_menu' => 'master_keluarga',
            "title" => "Status Rumah",
            "path" => "/status_rumah",
            'data' => $statusRumah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusRumah $statusRumah)
    {
        $validatedData = $request->validate([
            "status" => "required|max:100"
        ]);

        StatusRumah::where("id", $statusRumah->id)->update($validatedData);

        return redirect("/status_rumah")->with("success-update", "Berhasil memperbarui data Status Rumah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusRumah $statusRumah)
    {
        $statusRumah->destroy($statusRumah->id);
        return redirect("/status_rumah")->with("success-delete", "Berhasil menghapus data Status Rumah");
    }
}
