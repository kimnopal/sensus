<?php

namespace App\Http\Controllers;

use App\Models\RT;
use Illuminate\Http\Request;

class RTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        return view('pages.rt.index', [
            'type_menu' => '',
            "title" => "RT",
            "path" => "/rt",
            "datas" => RT::where("nomor", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.rt.create", [
            'type_menu' => '',
            "title" => "RT",
            "path" => "/rt",
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

        RT::create($validatedData);

        return redirect("/rt")->with("success-create", "Berhasil menambahkan data RT");
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
    public function edit(RT $rt)
    {
        return view("pages.rt.update", [
            'type_menu' => '',
            "title" => "RT",
            "path" => "/rt",
            'data' => $rt,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RT $rt)
    {
        $validatedData = $request->validate([
            "nomor" => "required"
        ]);

        RT::where("id", $rt->id)->update($validatedData);

        return redirect("/rt")->with("success-update", "Berhasil memperbarui data RT");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RT $rt)
    {
        $rt->destroy($rt->id);
        return redirect("/rt")->with("success-delete", "Berhasil menghapus data RT");
    }
}
