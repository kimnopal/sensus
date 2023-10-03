<?php

namespace App\Http\Controllers;

use App\Models\Individu;
use App\Models\PekerjaanIndividu;
use App\Models\PekerjaanUtama;
use App\Models\Penghasilan;
use App\Models\SumberPenghasilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividuPekerjaanController extends Controller
{
    public function create(Individu $individu)
    {
        return view("pages.individu.pekerjaan.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/$individu->id/pekerjaan",
            "dataKondisiPekerjaan" => DB::table("kondisi_pekerjaan")->get(),
            "dataPekerjaanUtama" => PekerjaanUtama::all(),
            "dataSumberPenghasilan" => SumberPenghasilan::with("satuan")->get(),
        ]);
    }

    public function store(Request $request, Individu $individu)
    {
        $rules = [
            "kondisi_pekerjaan" => "required|exists:kondisi_pekerjaan,id",
            "status_jamsostek" => "required|in:peserta,bukan peserta",
            "no_jamsostek" => "nullable|max:100",
            "gaji" => "required",
            "sumber_penghasilan.*.jumlah" => "nullable",
            "sumber_penghasilan.*.penghasilan" => "nullable",
            "sumber_penghasilan.*.ekspor" => "nullable|in:semua,sebagian besar,tidak",
        ];

        if ($request->checkbox_pekerjaan_utama_lainnya) {
            $rules["pekerjaan_utama_lainnya"] = "required|max:100";
        } else {
            $rules["pekerjaan_utama"] = "required|exists:pekerjaan_utama,id";
        }

        $validatedData = collect($request->validate($rules));

        if ($request->checkbox_pekerjaan_utama_lainnya) {
            $pekerjaanUtama = PekerjaanUtama::create([
                "nama" => $validatedData->get("pekerjaan_utama_lainnya"),
            ]);

            $validatedData->put("pekerjaan_utama_id", $pekerjaanUtama->id);
            $validatedData->forget("pekerjaan_utama_lainnya");
        } else {
            $validatedData->put("pekerjaan_utama_id", $validatedData->get("pekerjaan_utama"));
            $validatedData->forget("pekerjaan_utama");
        }

        $validatedData->put("kondisi_pekerjaan_id", $validatedData->get("kondisi_pekerjaan"));
        $validatedData->forget("kondisi_pekerjaan");

        $dataPenghasilan = $validatedData->only("sumber_penghasilan");
        $dataPekerjaanIndividu = $validatedData->except("sumber_penghasilan");
        $dataPekerjaanIndividu["individu_id"] = $individu->id;
        $pekerjaanIndividu = PekerjaanIndividu::create($dataPekerjaanIndividu->toArray());
        $dataPenghasilan = $dataPenghasilan->get("sumber_penghasilan");

        foreach ($dataPenghasilan as $id => $penghasilan) {
            if (is_null($penghasilan["jumlah"]) && is_null($penghasilan["penghasilan"]) && is_null($penghasilan["ekspor"])) {
                unset($dataPenghasilan[$id]);
            } else {
                $penghasilan["sumber_penghasilan_id"] = $id;
                $penghasilan["pekerjaan_individu_id"] = $pekerjaanIndividu->id;
                $dataPenghasilan[] = $penghasilan;
                unset($dataPenghasilan[$id]);
            }
        }

        Penghasilan::insert($dataPenghasilan);

        $individu->update([
            "step" => "pekerjaan"
        ]);

        return to_route("individu.kesehatan.create", ["individu" => $individu->id]);
    }

    public function edit(Individu $individu)
    {
        return view("pages.individu.pekerjaan.update", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/$individu->id/pekerjaan",
            "data" => PekerjaanIndividu::with(["list_penghasilan"])->where("individu_id", $individu->id)->first(),
            "dataKondisiPekerjaan" => DB::table("kondisi_pekerjaan")->get(),
            "dataPekerjaanUtama" => PekerjaanUtama::all(),
            "dataSumberPenghasilan" => SumberPenghasilan::with("satuan")->get(),
        ]);
    }

    public function update(Request $request, Individu $individu)
    {
        $rules = [
            "kondisi_pekerjaan" => "required|exists:kondisi_pekerjaan,id",
            "status_jamsostek" => "required|in:peserta,bukan peserta",
            "no_jamsostek" => "nullable|max:100",
            "gaji" => "required",
            "sumber_penghasilan.*.jumlah" => "nullable",
            "sumber_penghasilan.*.penghasilan" => "nullable",
            "sumber_penghasilan.*.ekspor" => "nullable|in:semua,sebagian besar,tidak",
        ];

        if ($request->checkbox_pekerjaan_utama_lainnya) {
            $rules["pekerjaan_utama_lainnya"] = "required|max:100";
        } else {
            $rules["pekerjaan_utama"] = "required|exists:pekerjaan_utama,id";
        }

        $validatedData = collect($request->validate($rules));

        if ($request->checkbox_pekerjaan_utama_lainnya) {
            $pekerjaanUtama = PekerjaanUtama::create([
                "nama" => $validatedData->get("pekerjaan_utama_lainnya"),
            ]);

            $validatedData->put("pekerjaan_utama_id", $pekerjaanUtama->id);
            $validatedData->forget("pekerjaan_utama_lainnya");
        } else {
            $validatedData->put("pekerjaan_utama_id", $validatedData->get("pekerjaan_utama"));
            $validatedData->forget("pekerjaan_utama");
        }

        $validatedData->put("kondisi_pekerjaan_id", $validatedData->get("kondisi_pekerjaan"));
        $validatedData->forget("kondisi_pekerjaan");

        $dataPenghasilan = $validatedData->only("sumber_penghasilan");
        $dataPekerjaanIndividu = $validatedData->except("sumber_penghasilan");
        $dataPekerjaanIndividu["individu_id"] = $individu->id;

        $pekerjaanIndividu = PekerjaanIndividu::where("individu_id", $individu->id)->first();
        $pekerjaanIndividu->update($dataPekerjaanIndividu->toArray());
        $dataPenghasilan = $dataPenghasilan->get("sumber_penghasilan");

        foreach ($dataPenghasilan as $id => $penghasilan) {
            if (is_null($penghasilan["jumlah"]) && is_null($penghasilan["penghasilan"]) && is_null($penghasilan["ekspor"])) {
                Penghasilan::where("pekerjaan_individu_id", $pekerjaanIndividu->id)
                    ->where("sumber_penghasilan_id", $id)->delete();
            } else {
                if (Penghasilan::where("pekerjaan_individu_id", $pekerjaanIndividu->id)
                    ->where("sumber_penghasilan_id", $id)->get()->isEmpty()
                ) {
                    $penghasilan["sumber_penghasilan_id"] = $id;
                    $penghasilan["pekerjaan_individu_id"] = $pekerjaanIndividu->id;
                    Penghasilan::create($penghasilan);
                } else {
                    Penghasilan::where("pekerjaan_individu_id", $pekerjaanIndividu->id)
                        ->where("sumber_penghasilan_id", $id)->update($penghasilan);
                }
            }
        }

        return to_route("individu.kesehatan.edit", ["individu" => $individu->id]);
    }
}
