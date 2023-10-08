<?php

namespace App\Http\Controllers;

use App\Models\EnumeratorKeluarga;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaEnumeratorController extends Controller
{
    public function create(Keluarga $keluarga)
    {
        return view("pages.keluarga.enumerator.create", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/enumerator",
        ]);
    }

    public function store(Request $request, Keluarga $keluarga)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:200",
            "alamat" => "required|max:200",
            "no_hp" => "required|max:100",
        ]);

        $validatedData["keluarga_id"] = $keluarga->id;

        EnumeratorKeluarga::create($validatedData);

        $keluarga->update([
            "step" => "selesai",
        ]);

        return redirect("/keluarga")->with("success-create", "Berhasil menambahkan data Keluarga");
    }

    public function edit(Keluarga $keluarga)
    {
        return view("pages.keluarga.enumerator.update", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/enumerator",
            "data" => EnumeratorKeluarga::where("keluarga_id", $keluarga->id)->first(),
        ]);
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:200",
            "alamat" => "required|max:200",
            "no_hp" => "required|max:100",
        ]);

        $validatedData["keluarga_id"] = $keluarga->id;

        EnumeratorKeluarga::where("keluarga_id", $keluarga->id)->update($validatedData);

        return redirect("/keluarga")->with("success-update", "Berhasil memperbarui data Keluarga");
    }
}
