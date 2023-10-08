<?php

namespace App\Http\Controllers;

use App\Models\JenisAtap;
use App\Models\JenisDinding;
use App\Models\JenisEnergiMemasak;
use App\Models\JenisLantai;
use App\Models\JenisPenerangan;
use App\Models\Keluarga;
use App\Models\KondisiFisikRumah;
use App\Models\PembuanganLimbah;
use App\Models\PermukimanKeluarga;
use App\Models\StatusLahan;
use App\Models\StatusRumah;
use App\Models\SumberAirMandi;
use App\Models\SumberAirMinum;
use App\Models\SumberKayu;
use App\Models\TataGuna;
use Illuminate\Http\Request;

class KeluargaPermukimanController extends Controller
{
    public function create(Keluarga $keluarga)
    {
        return view("pages.keluarga.permukiman.create", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/permukiman",
            "dataStatusRumah" => StatusRumah::all(),
            "dataStatusLahan" => StatusLahan::all(),
            "dataJenisLantai" => JenisLantai::all(),
            "dataJenisDinding" => JenisDinding::all(),
            "dataJenisAtap" => JenisAtap::all(),
            "dataJenisPenerangan" => JenisPenerangan::all(),
            "dataTataGuna" => TataGuna::all(),
            "dataJenisEnergiMemasak" => JenisEnergiMemasak::all(),
            "dataSumberKayu" => SumberKayu::all(),
            "dataSumberAirMandi" => SumberAirMandi::all(),
            "dataSumberAirMinum" => SumberAirMinum::all(),
            "dataPembuanganLimbah" => PembuanganLimbah::all(),
        ]);
    }

    public function store(Request $request, Keluarga $keluarga)
    {
        $rules = [
            "status_rumah" => "required|exists:status_rumah,id",
            "status_lahan" => "required|exists:status_lahan,id",
            "luas_lantai" => "required|numeric",
            "luas_lahan" => "required|numeric",
            "jenis_lantai" => "required|exists:jenis_lantai,id",
            "jenis_dinding" => "required|exists:jenis_dinding,id",
            "status_jendela" => "required|in:berfungsi,tidak berfungsi,tidak ada",
            "jenis_atap" => "required|exists:jenis_atap,id",
            "jenis_penerangan" => "required|exists:jenis_penerangan,id",
            "kondisi_fisik_rumah.*.status" => "nullable|in:ya,tidak",
            "jenis_energi_memasak" => "required|exists:jenis_energi_memasak,id",
            "sumber_kayu" => "required|exists:sumber_kayu,id",
            "tempat_pembuangan_sampah" => "required|in:tidak ada,di kebun/sungai/drainase,dibakar,tempat sampah,tempat sampah diangkut reguler",
            "fasilitas_mck" => "required|in:sendiri,berkelompok/tetangga,mck umum,tidak ada",
            "sumber_air_mandi" => "required|exists:sumber_air_mandi,id",
            "fasilitas_bab" => "required|in:jamban sendiri,jamban bersama/tetangga,mck umum,tidak ada",
            "sumber_air_minum" => "required|exists:sumber_air_minum,id",
            "pembuangan_limbah" => "required|exists:pembuangan_limbah,id",
            "rumah_dibawah_sutet" => "required|in:ya,tidak",
            "rumah_dibantaran_sungai" => "required|in:ya,tidak",
            "rumah_dilereng" => "required|in:ya,tidak",
            "kondisi_rumah" => "required|in:kumuh,tidak kumuh",
        ];

        if ($request->checkbox_status_rumah_lainnya) {
            $rules["status_rumah_lainnya"] = "required|max:100";
            unset($rules["status_rumah"]);
        }

        if ($request->checkbox_status_lahan_lainnya) {
            $rules["status_lahan_lainnya"] = "required|max:100";
            unset($rules["status_lahan"]);
        }

        if ($request->checkbox_jenis_lantai_lainnya) {
            $rules["jenis_lantai_lainnya"] = "required|max:100";
            unset($rules["jenis_lantai"]);
        }

        if ($request->checkbox_jenis_dinding_lainnya) {
            $rules["jenis_dinding_lainnya"] = "required|max:100";
            unset($rules["jenis_dinding"]);
        }

        if ($request->checkbox_jenis_atap_lainnya) {
            $rules["jenis_atap_lainnya"] = "required|max:100";
            unset($rules["jenis_atap"]);
        }

        if ($request->checkbox_jenis_penerangan_lainnya) {
            $rules["jenis_penerangan_lainnya"] = "required|max:100";
            unset($rules["jenis_penerangan"]);
        }

        if ($request->checkbox_jenis_energi_memasak_lainnya) {
            $rules["jenis_energi_memasak_lainnya"] = "required|max:100";
            unset($rules["jenis_energi_memasak"]);
        }

        if ($request->checkbox_sumber_kayu_lainnya) {
            $rules["sumber_kayu_lainnya"] = "required|max:100";
            unset($rules["sumber_kayu"]);
        }

        if ($request->checkbox_sumber_air_mandi_lainnya) {
            $rules["sumber_air_mandi_lainnya"] = "required|max:100";
            unset($rules["sumber_air_mandi"]);
        }

        if ($request->checkbox_sumber_air_minum_lainnya) {
            $rules["sumber_air_minum_lainnya"] = "required|max:100";
            unset($rules["sumber_air_minum"]);
        }

        if ($request->checkbox_pembuangan_limbah_lainnya) {
            $rules["pembuangan_limbah_lainnya"] = "required|max:100";
            unset($rules["pembuangan_limbah"]);
        }

        $validatedData = collect($request->validate($rules));

        if ($request->checkbox_status_rumah_lainnya) {
            $statusRumah = StatusRumah::create([
                "status" => $validatedData->get("status_rumah_lainnya"),
            ]);
            $validatedData->put("status_rumah_id", $statusRumah->id);
            $validatedData->forget("status_rumah_lainnya");
        } else {
            $validatedData->put("status_rumah_id", $validatedData->get("status_rumah"));
            $validatedData->forget("status_rumah");
        }

        if ($request->checkbox_status_lahan_lainnya) {
            $statusLahan = StatusLahan::create([
                "status" => $validatedData->get("status_lahan_lainnya"),
            ]);
            $validatedData->put("status_lahan_id", $statusLahan->id);
            $validatedData->forget("status_lahan_lainnya");
        } else {
            $validatedData->put("status_lahan_id", $validatedData->get("status_lahan"));
            $validatedData->forget("status_lahan");
        }

        if ($request->checkbox_jenis_lantai_lainnya) {
            $jenisLantai = JenisLantai::create([
                "jenis" => $validatedData->get("jenis_lantai_lainnya"),
            ]);
            $validatedData->put("jenis_lantai_id", $jenisLantai->id);
            $validatedData->forget("jenis_lantai_lainnya");
        } else {
            $validatedData->put("jenis_lantai_id", $validatedData->get("jenis_lantai"));
            $validatedData->forget("jenis_lantai");
        }

        if ($request->checkbox_jenis_dinding_lainnya) {
            $jenisDinding = JenisDinding::create([
                "jenis" => $validatedData->get("jenis_dinding_lainnya"),
            ]);
            $validatedData->put("jenis_dinding_id", $jenisDinding->id);
            $validatedData->forget("jenis_dinding_lainnya");
        } else {
            $validatedData->put("jenis_dinding_id", $validatedData->get("jenis_dinding"));
            $validatedData->forget("jenis_dinding");
        }

        if ($request->checkbox_jenis_atap_lainnya) {
            $jenisAtap = JenisAtap::create([
                "jenis" => $validatedData->get("jenis_atap_lainnya"),
            ]);
            $validatedData->put("jenis_atap_id", $jenisAtap->id);
            $validatedData->forget("jenis_atap_lainnya");
        } else {
            $validatedData->put("jenis_atap_id", $validatedData->get("jenis_atap"));
            $validatedData->forget("jenis_atap");
        }

        if ($request->checkbox_jenis_penerangan_lainnya) {
            $jenisPenerangan = JenisPenerangan::create([
                "jenis" => $validatedData->get("jenis_penerangan_lainnya"),
            ]);
            $validatedData->put("jenis_penerangan_id", $jenisPenerangan->id);
            $validatedData->forget("jenis_penerangan_lainnya");
        } else {
            $validatedData->put("jenis_penerangan_id", $validatedData->get("jenis_penerangan"));
            $validatedData->forget("jenis_penerangan");
        }

        if ($request->checkbox_jenis_energi_memasak_lainnya) {
            $jenisEnergiMemasak = JenisEnergiMemasak::create([
                "jenis" => $validatedData->get("jenis_energi_memasak_lainnya"),
            ]);
            $validatedData->put("jenis_energi_memasak_id", $jenisEnergiMemasak->id);
            $validatedData->forget("jenis_energi_memasak_lainnya");
        } else {
            $validatedData->put("jenis_energi_memasak_id", $validatedData->get("jenis_energi_memasak"));
            $validatedData->forget("jenis_energi_memasak");
        }

        if ($request->checkbox_sumber_kayu_lainnya) {
            $sumberKayu = SumberKayu::create([
                "sumber" => $validatedData->get("sumber_kayu_lainnya"),
            ]);
            $validatedData->put("sumber_kayu_id", $sumberKayu->id);
            $validatedData->forget("sumber_kayu_lainnya");
        } else {
            $validatedData->put("sumber_kayu_id", $validatedData->get("sumber_kayu"));
            $validatedData->forget("sumber_kayu");
        }

        if ($request->checkbox_sumber_air_mandi_lainnya) {
            $sumberAirMandi = SumberAirMandi::create([
                "sumber" => $validatedData->get("sumber_air_mandi_lainnya"),
            ]);
            $validatedData->put("sumber_air_mandi_id", $sumberAirMandi->id);
            $validatedData->forget("sumber_air_mandi_lainnya");
        } else {
            $validatedData->put("sumber_air_mandi_id", $validatedData->get("sumber_air_mandi"));
            $validatedData->forget("sumber_air_mandi");
        }

        if ($request->checkbox_sumber_air_minum_lainnya) {
            $sumberAirMinum = SumberAirMinum::create([
                "sumber" => $validatedData->get("sumber_air_minum_lainnya"),
            ]);
            $validatedData->put("sumber_air_minum_id", $sumberAirMinum->id);
            $validatedData->forget("sumber_air_minum_lainnya");
        } else {
            $validatedData->put("sumber_air_minum_id", $validatedData->get("sumber_air_minum"));
            $validatedData->forget("sumber_air_minum");
        }

        if ($request->checkbox_pembuangan_limbah_lainnya) {
            $pembuanganLimbah = PembuanganLimbah::create([
                "tempat" => $validatedData->get("pembuangan_limbah_lainnya"),
            ]);
            $validatedData->put("pembuangan_limbah_id", $pembuanganLimbah->id);
            $validatedData->forget("pembuangan_limbah_lainnya");
        } else {
            $validatedData->put("pembuangan_limbah_id", $validatedData->get("pembuangan_limbah"));
            $validatedData->forget("pembuangan_limbah");
        }

        $validatedData->put("keluarga_id", $keluarga->id);

        $dataPermukimanKeluarga = $validatedData->except("kondisi_fisik_rumah");
        $dataKondisiFisikRumah = $validatedData->get("kondisi_fisik_rumah");

        $permukimanKeluarga = PermukimanKeluarga::create($dataPermukimanKeluarga->toArray());

        foreach ($dataKondisiFisikRumah as $tataGunaId => $kondisiFisikRumah) {
            if (is_null($kondisiFisikRumah["status"])) {
                unset($dataKondisiFisikRumah[$tataGunaId]);
                continue;
            }

            $kondisiFisikRumah["permukiman_keluarga_id"] = $permukimanKeluarga->id;
            $kondisiFisikRumah["tata_guna_id"] = $tataGunaId;
            $dataKondisiFisikRumah[] = $kondisiFisikRumah;
            unset($dataKondisiFisikRumah[$tataGunaId]);
        }

        KondisiFisikRumah::insert($dataKondisiFisikRumah);

        $keluarga->update(["step" => "permukiman"]);

        return to_route("keluarga.pendidikan.create", [
            "keluarga" => $keluarga->id,
        ]);
    }

    public function edit(Keluarga $keluarga)
    {
        return view("pages.keluarga.permukiman.update", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/permukiman",
            "data" => PermukimanKeluarga::where("keluarga_id", $keluarga->id)->first(),
            "dataStatusRumah" => StatusRumah::all(),
            "dataStatusLahan" => StatusLahan::all(),
            "dataJenisLantai" => JenisLantai::all(),
            "dataJenisDinding" => JenisDinding::all(),
            "dataJenisAtap" => JenisAtap::all(),
            "dataJenisPenerangan" => JenisPenerangan::all(),
            "dataTataGuna" => TataGuna::all(),
            "dataJenisEnergiMemasak" => JenisEnergiMemasak::all(),
            "dataSumberKayu" => SumberKayu::all(),
            "dataSumberAirMandi" => SumberAirMandi::all(),
            "dataSumberAirMinum" => SumberAirMinum::all(),
            "dataPembuanganLimbah" => PembuanganLimbah::all(),
        ]);
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        $rules = [
            "status_rumah" => "required|exists:status_rumah,id",
            "status_lahan" => "required|exists:status_lahan,id",
            "luas_lantai" => "required|numeric",
            "luas_lahan" => "required|numeric",
            "jenis_lantai" => "required|exists:jenis_lantai,id",
            "jenis_dinding" => "required|exists:jenis_dinding,id",
            "status_jendela" => "required|in:berfungsi,tidak berfungsi,tidak ada",
            "jenis_atap" => "required|exists:jenis_atap,id",
            "jenis_penerangan" => "required|exists:jenis_penerangan,id",
            "kondisi_fisik_rumah.*.status" => "nullable|in:ya,tidak",
            "jenis_energi_memasak" => "required|exists:jenis_energi_memasak,id",
            "sumber_kayu" => "required|exists:sumber_kayu,id",
            "tempat_pembuangan_sampah" => "required|in:tidak ada,di kebun/sungai/drainase,dibakar,tempat sampah,tempat sampah diangkut reguler",
            "fasilitas_mck" => "required|in:sendiri,berkelompok/tetangga,mck umum,tidak ada",
            "sumber_air_mandi" => "required|exists:sumber_air_mandi,id",
            "fasilitas_bab" => "required|in:jamban sendiri,jamban bersama/tetangga,mck umum,tidak ada",
            "sumber_air_minum" => "required|exists:sumber_air_minum,id",
            "pembuangan_limbah" => "required|exists:pembuangan_limbah,id",
            "rumah_dibawah_sutet" => "required|in:ya,tidak",
            "rumah_dibantaran_sungai" => "required|in:ya,tidak",
            "rumah_dilereng" => "required|in:ya,tidak",
            "kondisi_rumah" => "required|in:kumuh,tidak kumuh",
        ];

        if ($request->checkbox_status_rumah_lainnya) {
            $rules["status_rumah_lainnya"] = "required|max:100";
            unset($rules["status_rumah"]);
        }

        if ($request->checkbox_status_lahan_lainnya) {
            $rules["status_lahan_lainnya"] = "required|max:100";
            unset($rules["status_lahan"]);
        }

        if ($request->checkbox_jenis_lantai_lainnya) {
            $rules["jenis_lantai_lainnya"] = "required|max:100";
            unset($rules["jenis_lantai"]);
        }

        if ($request->checkbox_jenis_dinding_lainnya) {
            $rules["jenis_dinding_lainnya"] = "required|max:100";
            unset($rules["jenis_dinding"]);
        }

        if ($request->checkbox_jenis_atap_lainnya) {
            $rules["jenis_atap_lainnya"] = "required|max:100";
            unset($rules["jenis_atap"]);
        }

        if ($request->checkbox_jenis_penerangan_lainnya) {
            $rules["jenis_penerangan_lainnya"] = "required|max:100";
            unset($rules["jenis_penerangan"]);
        }

        if ($request->checkbox_jenis_energi_memasak_lainnya) {
            $rules["jenis_energi_memasak_lainnya"] = "required|max:100";
            unset($rules["jenis_energi_memasak"]);
        }

        if ($request->checkbox_sumber_kayu_lainnya) {
            $rules["sumber_kayu_lainnya"] = "required|max:100";
            unset($rules["sumber_kayu"]);
        }

        if ($request->checkbox_sumber_air_mandi_lainnya) {
            $rules["sumber_air_mandi_lainnya"] = "required|max:100";
            unset($rules["sumber_air_mandi"]);
        }

        if ($request->checkbox_sumber_air_minum_lainnya) {
            $rules["sumber_air_minum_lainnya"] = "required|max:100";
            unset($rules["sumber_air_minum"]);
        }

        if ($request->checkbox_pembuangan_limbah_lainnya) {
            $rules["pembuangan_limbah_lainnya"] = "required|max:100";
            unset($rules["pembuangan_limbah"]);
        }

        $validatedData = collect($request->validate($rules));

        if ($request->checkbox_status_rumah_lainnya) {
            $statusRumah = StatusRumah::create([
                "status" => $validatedData->get("status_rumah_lainnya"),
            ]);
            $validatedData->put("status_rumah_id", $statusRumah->id);
            $validatedData->forget("status_rumah_lainnya");
        } else {
            $validatedData->put("status_rumah_id", $validatedData->get("status_rumah"));
            $validatedData->forget("status_rumah");
        }

        if ($request->checkbox_status_lahan_lainnya) {
            $statusLahan = StatusLahan::create([
                "status" => $validatedData->get("status_lahan_lainnya"),
            ]);
            $validatedData->put("status_lahan_id", $statusLahan->id);
            $validatedData->forget("status_lahan_lainnya");
        } else {
            $validatedData->put("status_lahan_id", $validatedData->get("status_lahan"));
            $validatedData->forget("status_lahan");
        }

        if ($request->checkbox_jenis_lantai_lainnya) {
            $jenisLantai = JenisLantai::create([
                "jenis" => $validatedData->get("jenis_lantai_lainnya"),
            ]);
            $validatedData->put("jenis_lantai_id", $jenisLantai->id);
            $validatedData->forget("jenis_lantai_lainnya");
        } else {
            $validatedData->put("jenis_lantai_id", $validatedData->get("jenis_lantai"));
            $validatedData->forget("jenis_lantai");
        }

        if ($request->checkbox_jenis_dinding_lainnya) {
            $jenisDinding = JenisDinding::create([
                "jenis" => $validatedData->get("jenis_dinding_lainnya"),
            ]);
            $validatedData->put("jenis_dinding_id", $jenisDinding->id);
            $validatedData->forget("jenis_dinding_lainnya");
        } else {
            $validatedData->put("jenis_dinding_id", $validatedData->get("jenis_dinding"));
            $validatedData->forget("jenis_dinding");
        }

        if ($request->checkbox_jenis_atap_lainnya) {
            $jenisAtap = JenisAtap::create([
                "jenis" => $validatedData->get("jenis_atap_lainnya"),
            ]);
            $validatedData->put("jenis_atap_id", $jenisAtap->id);
            $validatedData->forget("jenis_atap_lainnya");
        } else {
            $validatedData->put("jenis_atap_id", $validatedData->get("jenis_atap"));
            $validatedData->forget("jenis_atap");
        }

        if ($request->checkbox_jenis_penerangan_lainnya) {
            $jenisPenerangan = JenisPenerangan::create([
                "jenis" => $validatedData->get("jenis_penerangan_lainnya"),
            ]);
            $validatedData->put("jenis_penerangan_id", $jenisPenerangan->id);
            $validatedData->forget("jenis_penerangan_lainnya");
        } else {
            $validatedData->put("jenis_penerangan_id", $validatedData->get("jenis_penerangan"));
            $validatedData->forget("jenis_penerangan");
        }

        if ($request->checkbox_jenis_energi_memasak_lainnya) {
            $jenisEnergiMemasak = JenisEnergiMemasak::create([
                "jenis" => $validatedData->get("jenis_energi_memasak_lainnya"),
            ]);
            $validatedData->put("jenis_energi_memasak_id", $jenisEnergiMemasak->id);
            $validatedData->forget("jenis_energi_memasak_lainnya");
        } else {
            $validatedData->put("jenis_energi_memasak_id", $validatedData->get("jenis_energi_memasak"));
            $validatedData->forget("jenis_energi_memasak");
        }

        if ($request->checkbox_sumber_kayu_lainnya) {
            $sumberKayu = SumberKayu::create([
                "sumber" => $validatedData->get("sumber_kayu_lainnya"),
            ]);
            $validatedData->put("sumber_kayu_id", $sumberKayu->id);
            $validatedData->forget("sumber_kayu_lainnya");
        } else {
            $validatedData->put("sumber_kayu_id", $validatedData->get("sumber_kayu"));
            $validatedData->forget("sumber_kayu");
        }

        if ($request->checkbox_sumber_air_mandi_lainnya) {
            $sumberAirMandi = SumberAirMandi::create([
                "sumber" => $validatedData->get("sumber_air_mandi_lainnya"),
            ]);
            $validatedData->put("sumber_air_mandi_id", $sumberAirMandi->id);
            $validatedData->forget("sumber_air_mandi_lainnya");
        } else {
            $validatedData->put("sumber_air_mandi_id", $validatedData->get("sumber_air_mandi"));
            $validatedData->forget("sumber_air_mandi");
        }

        if ($request->checkbox_sumber_air_minum_lainnya) {
            $sumberAirMinum = SumberAirMinum::create([
                "sumber" => $validatedData->get("sumber_air_minum_lainnya"),
            ]);
            $validatedData->put("sumber_air_minum_id", $sumberAirMinum->id);
            $validatedData->forget("sumber_air_minum_lainnya");
        } else {
            $validatedData->put("sumber_air_minum_id", $validatedData->get("sumber_air_minum"));
            $validatedData->forget("sumber_air_minum");
        }

        if ($request->checkbox_pembuangan_limbah_lainnya) {
            $pembuanganLimbah = PembuanganLimbah::create([
                "tempat" => $validatedData->get("pembuangan_limbah_lainnya"),
            ]);
            $validatedData->put("pembuangan_limbah_id", $pembuanganLimbah->id);
            $validatedData->forget("pembuangan_limbah_lainnya");
        } else {
            $validatedData->put("pembuangan_limbah_id", $validatedData->get("pembuangan_limbah"));
            $validatedData->forget("pembuangan_limbah");
        }

        $validatedData->put("keluarga_id", $keluarga->id);

        $dataPermukimanKeluarga = $validatedData->except("kondisi_fisik_rumah");
        $dataKondisiFisikRumah = $validatedData->get("kondisi_fisik_rumah");

        $permukimanKeluarga = PermukimanKeluarga::where("keluarga_id", $keluarga->id)->first();
        $permukimanKeluarga->update($dataPermukimanKeluarga->toArray());

        foreach ($dataKondisiFisikRumah as $tataGunaId => $kondisiFisikRumah) {
            if (is_null($kondisiFisikRumah["status"])) {
                KondisiFisikRumah::where("permukiman_keluarga_id", $permukimanKeluarga->id)->where("tata_guna_id", $tataGunaId)->delete();
                continue;
            }

            if (KondisiFisikRumah::where("permukiman_keluarga_id", $permukimanKeluarga->id)->where("tata_guna_id", $tataGunaId)->get()->isEmpty()) {
                $kondisiFisikRumah["permukiman_keluarga_id"] = $permukimanKeluarga->id;
                $kondisiFisikRumah["tata_guna_id"] = $tataGunaId;
                KondisiFisikRumah::create($kondisiFisikRumah);
            } else {
                KondisiFisikRumah::where("permukiman_keluarga_id", $permukimanKeluarga->id)->where("tata_guna_id", $tataGunaId)->update($kondisiFisikRumah);
            }
        }

        return to_route("keluarga.pendidikan.edit", [
            "keluarga" => $keluarga->id,
        ]);
    }
}
