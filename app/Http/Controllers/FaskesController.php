<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use Illuminate\Http\Request;

class FaskesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        return view("pages.master.faskes.index", [
            "type_menu" => "master",
            "title" => "Fasilitas Kesehatan",
            "path" => "/faskes",
            "datas" => Faskes::where("nama", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.faskes.create", [
            "type_menu" => "master",
            "title" => "Fasilitas Kesehatan",
            "path" => "/faskes",
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

        Faskes::create($validatedData);

        return redirect("/faskes")->with("success-create", "Berhasil menambahkan data Fasilitas Kesehatan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Faskes $faskes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faskes $faskes)
    {
        return view("pages.master.faskes.update", [
            "type_menu" => "master",
            "title" => "Fasilitas Kesehatan",
            "path" => "/faskes",
            "data" => $faskes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faskes $faskes)
    {
        $validatedData = $request->validate([
            "nama" => "required"
        ]);

        Faskes::where("id", $faskes->id)->update($validatedData);

        return redirect("/faskes")->with("success-update", "Berhasil memperbarui data Fasilitas Kesehatan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faskes $faskes)
    {
        $faskes->destroy($faskes->id);
        return redirect("/faskes")->with("success-delete", "Berhasil menghapus data Fasilitas Kesehatan");
    }
}
