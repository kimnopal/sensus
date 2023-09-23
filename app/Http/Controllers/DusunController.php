<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        return view('pages.master.dusun.dusun', [
            'type_menu' => 'master',
            'title' => "Dusun",
            'path' => "/dusun",
            "datas" => Dusun::where("nama", "LIKE", "%$search%")->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.master.dusun.create", [
            'type_menu' => 'master',
            'title' => "Dusun",
            'path' => "/dusun",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:100",
        ]);

        Dusun::create($validatedData);

        return redirect("/dusun")->with("success-create", "Berhasil menambahkan data Dusun");
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
    public function edit(Dusun $dusun)
    {
        return view("pages.master.dusun.update", [
            'type_menu' => 'master',
            'title' => "Dusun",
            'path' => "/dusun",
            'dusun' => $dusun,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dusun $dusun)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255"
        ]);

        Dusun::where("id", $dusun->id)->update($validatedData);

        return redirect("/dusun")->with("success-update", "Berhasil memperbarui data Dusun");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dusun $dusun)
    {
        $dusun->destroy($dusun->id);
        return redirect("/dusun")->with("success-delete", "Berhasil menghapus data Dusun");
    }
}
