<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\SumberPenghasilan;
use Illuminate\Http\Request;

class SumberPenghasilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        return view("pages.master.sumber_penghasilan.index", [
            "type_menu" => "master",
            "title" => "Sumber Penghasilan",
            "path" => "/sumber_penghasilan",
            "datas" => SumberPenghasilan::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.sumber_penghasilan.create", [
            'type_menu' => 'master',
            'title' => "Sumber Penghasilan",
            'path' => "/sumber_penghasilan",
            "dataSatuan" => Satuan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => "required",
            "satuan" => "required|exists:satuan,id"
        ]);

        $validatedData["satuan_id"] = $validatedData["satuan"];
        unset($validatedData["satuan"]);

        SumberPenghasilan::create($validatedData);

        return redirect("/sumber_penghasilan")->with("success-create", "Berhasil menambahkan data Sumber Penghasilan");
    }

    /**
     * Display the specified resource.
     */
    public function show(SumberPenghasilan $sumberPenghasilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SumberPenghasilan $sumberPenghasilan)
    {
        return view("pages.master.sumber_penghasilan.update", [
            'type_menu' => 'master',
            'title' => "Sumber Penghasilan",
            'path' => "/sumber_penghasilan",
            'data' => $sumberPenghasilan,
            "dataSatuan" => Satuan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SumberPenghasilan $sumberPenghasilan)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255"
        ]);

        SumberPenghasilan::where("id", $sumberPenghasilan->id)->update($validatedData);

        return redirect("/sumber_penghasilan")->with("success-update", "Berhasil memperbarui data Sumber Penghasilan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SumberPenghasilan $sumberPenghasilan)
    {
        $sumberPenghasilan->destroy($sumberPenghasilan->id);
        return redirect("/sumber_penghasilan")->with("success-delete", "Berhasil menghapus data Sumber Penghasilan");
    }
}
