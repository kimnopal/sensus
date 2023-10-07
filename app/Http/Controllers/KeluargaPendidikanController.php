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
}
