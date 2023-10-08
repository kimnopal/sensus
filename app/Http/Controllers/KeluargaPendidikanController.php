<?php

namespace App\Http\Controllers;

use App\Models\AksesPendidikan;
use App\Models\JenisPendidikan;
use App\Models\Keluarga;
use App\Models\PendidikanKeluarga;
use Illuminate\Http\Request;

class KeluargaPendidikanController extends Controller
{
    public function create(Keluarga $keluarga)
    {
        return view("pages.keluarga.pendidikan.create", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/pendidikan",
            "dataJenisPendidikan" => JenisPendidikan::all(),
        ]);
    }

    public function store(Request $request, Keluarga $keluarga)
    {
        $rules = [
            "anak_bersekolah" => "required|in:ada,tidak",
            "anak_putus_sekolah" => "required|in:ada,tidak",
            "buta_huruf" => "required|in:ada,tidak",
            "akses_pendidikan.*.jarak_tempuh" => "nullable|numeric",
            "akses_pendidikan.*.waktu_tempuh" => "nullable|numeric",
            "akses_pendidikan.*.status" => "nullable|in:mudah,sulit",
        ];

        $validatedData = collect($request->validate($rules));

        $dataPendidikanKeluarga = $validatedData->except("akses_pendidikan");
        $dataAksesPendidikan = $validatedData->get("akses_pendidikan");

        $dataPendidikanKeluarga["keluarga_id"] = $keluarga->id;
        $pendidikanKeluarga = PendidikanKeluarga::create($dataPendidikanKeluarga->toArray());

        foreach ($dataAksesPendidikan as $jenisPendidikanId => $aksesPendidikan) {
            if (is_null($aksesPendidikan["jarak_tempuh"]) && is_null($aksesPendidikan["waktu_tempuh"]) && is_null($aksesPendidikan["status"])) {
                unset($dataAksesPendidikan[$jenisPendidikanId]);
                continue;
            }

            $aksesPendidikan["pendidikan_keluarga_id"] = $pendidikanKeluarga->id;
            $aksesPendidikan["jenis_pendidikan_id"] = $jenisPendidikanId;
            $dataAksesPendidikan[] = $aksesPendidikan;
            unset($dataAksesPendidikan[$jenisPendidikanId]);
        }

        AksesPendidikan::insert($dataAksesPendidikan);

        $keluarga->update([
            "step" => "pendidikan",
        ]);

        return to_route("keluarga.kesehatan.create", ["keluarga" => $keluarga->id]);
    }

    public function edit(Keluarga $keluarga)
    {
        return view("pages.keluarga.pendidikan.update", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/pendidikan",
            "data" => PendidikanKeluarga::with(["list_akses_pendidikan"])->where("keluarga_id", $keluarga->id)->first(),
            "dataJenisPendidikan" => JenisPendidikan::all(),
        ]);
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        $rules = [
            "anak_bersekolah" => "required|in:ada,tidak",
            "anak_putus_sekolah" => "required|in:ada,tidak",
            "buta_huruf" => "required|in:ada,tidak",
            "akses_pendidikan.*.jarak_tempuh" => "nullable|numeric",
            "akses_pendidikan.*.waktu_tempuh" => "nullable|numeric",
            "akses_pendidikan.*.status" => "nullable|in:mudah,sulit",
        ];

        $validatedData = collect($request->validate($rules));

        $dataPendidikanKeluarga = $validatedData->except("akses_pendidikan");
        $dataAksesPendidikan = $validatedData->get("akses_pendidikan");

        $dataPendidikanKeluarga["keluarga_id"] = $keluarga->id;
        $pendidikanKeluarga = PendidikanKeluarga::where("keluarga_id", $keluarga->id)->first();
        $pendidikanKeluarga->update($dataPendidikanKeluarga->toArray());

        foreach ($dataAksesPendidikan as $jenisPendidikanId => $aksesPendidikan) {
            if (is_null($aksesPendidikan["jarak_tempuh"]) && is_null($aksesPendidikan["waktu_tempuh"]) && is_null($aksesPendidikan["status"])) {
                AksesPendidikan::where("pendidikan_keluarga_id", $pendidikanKeluarga->id)->where("jenis_pendidikan_id", $jenisPendidikanId)->delete();
                continue;
            }

            if (AksesPendidikan::where("pendidikan_keluarga_id", $pendidikanKeluarga->id)->where("jenis_pendidikan_id", $jenisPendidikanId)->get()->isEmpty()) {
                $aksesPendidikan["pendidikan_keluarga_id"] = $pendidikanKeluarga->id;
                $aksesPendidikan["jenis_pendidikan_id"] = $jenisPendidikanId;
                AksesPendidikan::create($aksesPendidikan);
            } else {
                AksesPendidikan::where("pendidikan_keluarga_id", $pendidikanKeluarga->id)->where("jenis_pendidikan_id", $jenisPendidikanId)->update($aksesPendidikan);
            }
        }

        return to_route("keluarga.kesehatan.edit", ["keluarga" => $keluarga->id]);
    }
}
