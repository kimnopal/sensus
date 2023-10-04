<?php

namespace App\Http\Controllers;

use App\Models\Disabilitas;
use App\Models\Faskes;
use App\Models\FrekuensiPerawatan;
use App\Models\Individu;
use App\Models\KesehatanIndividu;
use App\Models\Penyakit;
use App\Models\StatusDisabilitas;
use App\Models\StatusPenyakit;
use Illuminate\Http\Request;

class IndividuKesehatanController extends Controller
{
    public function create(Individu $individu)
    {
        return view("pages.individu.kesehatan.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/$individu->id/kesehatan",
            "dataPenyakit" => Penyakit::all(),
            "dataFaskes" => Faskes::all(),
            "dataDisabilitas" => Disabilitas::all(),
        ]);
    }

    public function store(Request $request, Individu $individu)
    {
        $validatedData = $request->validate([
            "status_penyakit.*" => "required|in:ya,tidak",
            "frekuensi.*" => "nullable|integer",
            "status_jamsoskes" => "required|in:peserta,bukan peserta",
            "no_jamsoskes" => "nullable",
            "status_disabilitas.*" => "required|in:ya,tidak",
        ]);

        $kesehatanIndividu = KesehatanIndividu::create([
            "individu_id" => $individu->id,
            "status_jamsoskes" => $validatedData['status_jamsoskes'],
            "no_jamsoskes" => $validatedData['no_jamsoskes'],
        ]);

        $statusPenyakit = [];
        foreach ($validatedData['status_penyakit'] as $penyakit_id => $status) {
            if ($status == "ya") {
                $statusPenyakit[] = [
                    "kesehatan_individu_id" => $kesehatanIndividu->id,
                    "penyakit_id" => $penyakit_id,
                    "status" => $status,
                ];
            }
        }
        StatusPenyakit::insert($statusPenyakit);

        $frekuensiPerawatan = [];
        foreach ($validatedData["frekuensi"] as $faskes_id => $frekuensi) {
            if (!is_null($frekuensi)) {
                $frekuensiPerawatan[] = [
                    "kesehatan_individu_id" => $kesehatanIndividu->id,
                    "faskes_id" => $faskes_id,
                    "frekuensi" => $frekuensi,
                ];
            }
        }
        FrekuensiPerawatan::insert($frekuensiPerawatan);

        $statusDisabilitas = [];
        foreach ($validatedData["status_disabilitas"] as $disabilitas_id => $status) {
            if ($status == "ya") {
                $statusDisabilitas[] = [
                    "kesehatan_individu_id" => $kesehatanIndividu->id,
                    "disabilitas_id" => $disabilitas_id,
                    "status" => $status,
                ];
            }
        }
        StatusDisabilitas::insert($statusDisabilitas);

        $individu->update([
            "step" => "kesehatan",
        ]);

        return to_route("individu.pendidikan.create", [
            "individu" => $individu->id,
        ]);
    }

    public function edit(Individu $individu)
    {
        return view("pages.individu.kesehatan.update", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/$individu->id/kesehatan",
            "data" => KesehatanIndividu::with(["list_status_penyakit", "list_frekuensi_perawatan", "list_status_disabilitas"])->where("individu_id", $individu->id)->first(),
            "dataPenyakit" => Penyakit::all(),
            "dataFaskes" => Faskes::all(),
            "dataDisabilitas" => Disabilitas::all(),
        ]);
    }

    public function update(Request $request, Individu $individu)
    {
        $validatedData = $request->validate([
            "status_penyakit.*" => "required|in:ya,tidak",
            "frekuensi.*" => "nullable|integer",
            "status_jamsoskes" => "required|in:peserta,bukan peserta",
            "no_jamsoskes" => "nullable",
            "status_disabilitas.*" => "required|in:ya,tidak",
        ]);

        $kesehatanIndividu = KesehatanIndividu::where("individu_id", $individu->id)->first();
        $kesehatanIndividu->update([
            "status_jamsoskes" => $validatedData['status_jamsoskes'],
            "no_jamsoskes" => $validatedData['no_jamsoskes'],
        ]);

        foreach ($validatedData['status_penyakit'] as $penyakit_id => $status) {
            if ($status == "ya") {
                if (StatusPenyakit::where("kesehatan_individu_id", $kesehatanIndividu->id)
                    ->where("penyakit_id", $penyakit_id)->get()->isEmpty()
                ) {
                    StatusPenyakit::create([
                        "kesehatan_individu_id" => $kesehatanIndividu->id,
                        "penyakit_id" => $penyakit_id,
                        "status" => $status,
                    ]);
                }
            } else {
                StatusPenyakit::where("kesehatan_individu_id", $kesehatanIndividu->id)
                    ->where("penyakit_id", $penyakit_id)->delete();
            }
        }

        foreach ($validatedData["frekuensi"] as $faskes_id => $frekuensi) {
            if (!is_null($frekuensi) && $frekuensi != 0) {
                if (FrekuensiPerawatan::where("kesehatan_individu_id", $kesehatanIndividu->id)
                    ->where("faskes_id", $faskes_id)->get()->isEmpty()
                ) {
                    FrekuensiPerawatan::create([
                        "kesehatan_individu_id" => $kesehatanIndividu->id,
                        "faskes_id" => $faskes_id,
                        "frekuensi" => $frekuensi,
                    ]);
                }
            } else {
                FrekuensiPerawatan::where("kesehatan_individu_id", $kesehatanIndividu->id)
                    ->where("faskes_id", $faskes_id)->delete();
            }
        }

        foreach ($validatedData["status_disabilitas"] as $disabilitas_id => $status) {
            if ($status == "ya") {
                if (StatusDisabilitas::where("kesehatan_individu_id", $kesehatanIndividu->id)
                    ->where("disabilitas_id", $disabilitas_id)->get()->isEmpty()
                ) {
                    StatusDisabilitas::create([
                        "kesehatan_individu_id" => $kesehatanIndividu->id,
                        "disabilitas_id" => $disabilitas_id,
                        "status" => $status,
                    ]);
                }
            } else {
                StatusDisabilitas::where("kesehatan_individu_id", $kesehatanIndividu->id)
                    ->where("disabilitas_id", $disabilitas_id)->delete();
            }
        }

        return to_route("individu.pendidikan.edit", [
            "individu" => $individu->id,
        ]);
    }
}
