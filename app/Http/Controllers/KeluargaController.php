<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Keluarga;
use App\Models\RT;
use App\Models\RW;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.keluarga.index", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/create/deskripsi",
            "datas" => Keluarga::with(["dusun", "rt", "rw"])->where("no_kk", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("pages.keluarga.deskripsi.create", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/deskripsi",
            "dataDusun" => Dusun::all(),
            "dataRT" => RT::all(),
            "dataRW" => RW::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "no_kk" => "required|unique:keluarga,no_kk",
            "dusun" => "integer|nullable|exists:dusun,id",
            "rt" => "integer|nullable|exists:rt,id",
            "rw" => "integer|nullable|exists:rw,id",
        ];

        if ($request->checkbox_dusun_lainnya) {
            $rules["dusun_lainnya"] = "required|max:100";
            unset($rules["dusun"]);
        }

        if ($request->checkbox_rt_lainnya) {
            $rules["rt_lainnya"] = "required";
            unset($rules["rt"]);
        }

        if ($request->checkbox_rw_lainnya) {
            $rules["rw_lainnya"] = "required";
            unset($rules["rw"]);
        }

        $validatedData = collect($request->validate($rules));

        if ($request->checkbox_dusun_lainnya) {
            $dusun = Dusun::create(["nama" => $validatedData->get("dusun_lainnya")]);
            $validatedData->put("dusun_id", $dusun->id);
        } else {
            $validatedData->put("dusun_id", $validatedData->get("dusun"));
        }

        if ($request->checkbox_rt_lainnya) {
            $rt = RT::create(["nomor" => $validatedData->get("rt_lainnya")]);
            $validatedData->put("rt_id", $rt->id);
        } else {
            $validatedData->put("rt_id", $validatedData->get("rt"));
        }

        if ($request->checkbox_rw_lainnya) {
            $rw = RW::create(["nomor" => $validatedData->get("rw_lainnya")]);
            $validatedData->put("rw_id", $rw->id);
        } else {
            $validatedData->put("rw_id", $validatedData->get("rw"));
        }

        $validatedData->put("provinsi", "jawa barat");
        $validatedData->put("kabupaten", "pangandaran");
        $validatedData->put("kecamatan", "cijulang");
        $validatedData->put("desa", "batukaras");

        $keluarga = Keluarga::create($validatedData->toArray());

        return to_route("keluarga.permukiman.create", [
            "keluarga" => $keluarga->id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keluarga $keluarga)
    {
        return view("pages.keluarga.deskripsi.update", [
            'type_menu' => '',
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/deskripsi",
            "data" => $keluarga,
            "dataDusun" => Dusun::all(),
            "dataRT" => RT::all(),
            "dataRW" => RW::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        $rules = [
            "dusun" => "integer|nullable|exists:dusun,id",
            "rt" => "integer|nullable|exists:rt,id",
            "rw" => "integer|nullable|exists:rw,id",
        ];

        if ($request->no_kk != $keluarga->no_kk) {
            $rules["no_kk"] = "required|unique:keluarga,no_kk";
        }

        if ($keluarga->no_kk != $request->input("no_kk")) {
            $rules["no_kk"] = "required|unique:keluarga,no_kk";
        }

        if ($request->checkbox_dusun_lainnya) {
            $rules["dusun_lainnya"] = "required|max:100";
            unset($rules["dusun"]);
        }

        if ($request->checkbox_rt_lainnya) {
            $rules["rt_lainnya"] = "required";
            unset($rules["rt"]);
        }

        if ($request->checkbox_rw_lainnya) {
            $rules["rw_lainnya"] = "required";
            unset($rules["rw"]);
        }

        $validatedData = collect($request->validate($rules));

        if ($request->checkbox_dusun_lainnya) {
            $dusun = Dusun::create(["nama" => $validatedData->get("dusun_lainnya")]);
            $validatedData->put("dusun_id", $dusun->id);
            $validatedData->forget("dusun_lainnya");
        } else {
            $validatedData->put("dusun_id", $validatedData->get("dusun"));
            $validatedData->forget("dusun");
        }

        if ($request->checkbox_rt_lainnya) {
            $rt = RT::create(["nomor" => $validatedData->get("rt_lainnya")]);
            $validatedData->put("rt_id", $rt->id);
            $validatedData->forget("rt_lainnya");
        } else {
            $validatedData->put("rt_id", $validatedData->get("rt"));
            $validatedData->forget("rt");
        }

        if ($request->checkbox_rw_lainnya) {
            $rw = RW::create(["nomor" => $validatedData->get("rw_lainnya")]);
            $validatedData->put("rw_id", $rw->id);
            $validatedData->forget("rw_lainnya");
        } else {
            $validatedData->put("rw_id", $validatedData->get("rw"));
            $validatedData->forget("rw");
        }

        Keluarga::where("id", $keluarga->id)->update($validatedData->toArray());

        return to_route("keluarga.permukiman.edit", ["keluarga" => $keluarga->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keluarga $keluarga)
    {
        $keluarga->destroy($keluarga->id);
        return redirect("/keluarga")->with("success-delete", "Berhasil menghapus data Keluarga");
    }
}
