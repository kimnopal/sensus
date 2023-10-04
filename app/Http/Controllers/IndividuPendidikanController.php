<?php

namespace App\Http\Controllers;

use App\Models\Individu;
use App\Models\PendidikanAktif;
use App\Models\PendidikanIndividu;
use App\Models\TingkatPendidikan;
use Illuminate\Http\Request;

class IndividuPendidikanController extends Controller
{
    public function create(Individu $individu)
    {
        return view("pages.individu.pendidikan.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/$individu->id/pendidikan",
            "dataTingkatPendidikan" => TingkatPendidikan::all(),
            "dataPendidikanAktif" => PendidikanAktif::all(),
        ]);
    }

    public function store(Request $request, Individu $individu)
    {
        $rules = [
            "tingkat_pendidikan" => "required|exists:tingkat_pendidikan,id",
            "pendidikan_aktif" => "required|exists:pendidikan_aktif,id",
            "status_baca_tulis" => "required|in:ya,tidak",
            "bahasa_normal" => "required|max:100",
            "bahasa_formal" => "required|max:100",
            "total_kerja_bakti" => "required|integer",
            "total_siskamling" => "required|integer",
            "total_pesta_rakyat" => "required|integer",
            "total_menolong_kematian" => "required|integer",
            "total_menolong_sakit" => "required|integer",
            "total_menolong_kecelakaan" => "required|integer",
        ];

        if ($request->checkbox_tingkat_pendidikan_lainnya) {
            $rules["tingkat_pendidikan_lainnya"] = "required|max:100";
            unset($rules["tingkat_pendidikan"]);
        }

        $validatedData = collect($request->validate($rules));

        if ($request->checkbox_tingkat_pendidikan_lainnya) {
            $tingkatPendidikanId = TingkatPendidikan::create([
                "nama" => $validatedData->get("tingkat_pendidikan_lainnya"),
            ])->id;
            $validatedData->put("tingkat_pendidikan_id", $tingkatPendidikanId);
        } else {
            $validatedData->put("tingkat_pendidikan_id", $validatedData->get("tingkat_pendidikan"));
        }

        $validatedData->put("individu_id", $individu->id);
        $validatedData->put("pendidikan_aktif_id", $validatedData->get("pendidikan_aktif"));

        PendidikanIndividu::create($validatedData->toArray());

        $individu->update([
            "step" => "selesai"
        ]);

        return redirect("/individu")->with("success-create", "Berhasil menambahkan data Individu");
    }

    public function edit(Individu $individu)
    {
        return view("pages.individu.pendidikan.update", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/$individu->id/pendidikan",
            "data" => PendidikanIndividu::where("individu_id", $individu->id)->first(),
            "dataTingkatPendidikan" => TingkatPendidikan::all(),
            "dataPendidikanAktif" => PendidikanAktif::all(),
        ]);
    }

    public function update(Request $request, Individu $individu)
    {
        $rules = [
            "tingkat_pendidikan" => "required|exists:tingkat_pendidikan,id",
            "pendidikan_aktif" => "required|exists:pendidikan_aktif,id",
            "status_baca_tulis" => "required|in:ya,tidak",
            "bahasa_normal" => "required|max:100",
            "bahasa_formal" => "required|max:100",
            "total_kerja_bakti" => "required|integer",
            "total_siskamling" => "required|integer",
            "total_pesta_rakyat" => "required|integer",
            "total_menolong_kematian" => "required|integer",
            "total_menolong_sakit" => "required|integer",
            "total_menolong_kecelakaan" => "required|integer",
        ];

        if ($request->checkbox_tingkat_pendidikan_lainnya) {
            $rules["tingkat_pendidikan_lainnya"] = "required|max:100";
            unset($rules["tingkat_pendidikan"]);
        }

        $validatedData = collect($request->validate($rules));

        if ($request->checkbox_tingkat_pendidikan_lainnya) {
            $tingkatPendidikanId = TingkatPendidikan::create([
                "nama" => $validatedData->get("tingkat_pendidikan_lainnya"),
            ])->id;
            $validatedData->put("tingkat_pendidikan_id", $tingkatPendidikanId);

            $validatedData->forget("tingkat_pendidikan_lainnya");
        } else {
            $validatedData->put("tingkat_pendidikan_id", $validatedData->get("tingkat_pendidikan"));

            $validatedData->forget("tingkat_pendidikan");
        }

        $validatedData->put("individu_id", $individu->id);
        $validatedData->put("pendidikan_aktif_id", $validatedData->get("pendidikan_aktif"));
        $validatedData->forget("pendidikan_aktif");

        PendidikanIndividu::where("individu_id", $individu->id)->update($validatedData->toArray());

        return redirect("/individu")->with("success-create", "Berhasil memperbarui data Individu");
    }
}
