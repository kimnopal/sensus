<?php

namespace App\Http\Controllers;

use App\Models\AksesFaskes;
use App\Models\AksesTenagaKesehatan;
use App\Models\JenisFaskes;
use App\Models\JenisTenagaKesehatan;
use App\Models\Keluarga;
use App\Models\KesehatanKeluarga;
use App\Models\SaranaPrasaranaTransportasi;
use App\Models\TujuanTransportasi;
use Illuminate\Http\Request;

class KeluargaKesehatanController extends Controller
{
    public function create(Keluarga $keluarga)
    {
        return view("pages.keluarga.kesehatan.create", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/kesehatan",
            "dataJenisFaskes" => JenisFaskes::all(),
            "dataJenisTenagaKesehatan" => JenisTenagaKesehatan::all(),
            "dataTujuanTransportasi" => TujuanTransportasi::all(),
        ]);
    }

    public function store(Request $request, Keluarga $keluarga)
    {
        $rules = [
            "keluarga_posyandu" => "required|in:ya,tidak",
            "bayi_gizi_baik" => "required|in:ya,tidak",
            "lansia_posyandu" => "required|in:ya,tidak",
            "keluarga_jaskesmas" => "required|in:ya,tidak",
            "akses_faskes.*.jarak_tempuh" => "nullable|numeric",
            "akses_faskes.*.waktu_tempuh" => "nullable|numeric",
            "akses_faskes.*.status" => "nullable|in:mudah,sulit",
            "akses_tenaga_kesehatan.*.jarak_tempuh" => "nullable|numeric",
            "akses_tenaga_kesehatan.*.waktu_tempuh" => "nullable|numeric",
            "akses_tenaga_kesehatan.*.status" => "nullable|in:mudah,sulit",
            "pus_kb" => "required|in:ya,tidak",
            "pus_tidak_kb" => "required|in:ya,tidak",
            "keluarga_bkb" => "required|in:ya,tidak",
            "keluarga_bkr" => "required|in:ya,tidak",
            "keluarga_bkl" => "required|in:ya,tidak",
            "keluarga_uppks" => "required|in:ya,tidak",
            "peserta_paguyuban" => "required|in:ya,tidak",
            "remaja_pikr" => "required|in:ya,tidak",
            "remaja_saka_kencana" => "required|in:ya,tidak",
            "sarana_prasarana_transportasi.*.jenis_transportasi_terlama" => "nullable|in:darat,air,udara",
            "sarana_prasarana_transportasi.*.penggunaan_transportasi_umum" => "nullable|in:ya,tidak",
            "sarana_prasarana_transportasi.*.waktu_tempuh" => "nullable|numeric",
            "sarana_prasarana_transportasi.*.biaya" => "nullable|numeric",
            "sarana_prasarana_transportasi.*.kemudahan" => "nullable|in:mudah,sulit",
            "blt" => "required|in:ya,tidak",
            "pkh" => "required|in:ya,tidak",
            "bst" => "required|in:ya,tidak",
            "banpres" => "required|in:ya,tidak",
            "bantuan_umkm" => "required|in:ya,tidak",
            "bantuan_pekerja" => "required|in:ya,tidak",
            "bantuan_pendidikan" => "required|in:ya,tidak",
            "bantuan_listrik" => "required|in:ya,tidak",
            "manfaat_pekarangan" => "required|in:ada,tidak",
            "keluarga_tani" => "required|in:ada,tidak",
            "keluarga_rukun_nelayan" => "required|in:ada,tidak",
        ];

        $validatedData = collect($request->validate($rules));

        $dataKesehatankeluarga = $validatedData->except(["akses_faskes", "akses_tenaga_kesehatan", "sarana_prasarana_transportasi"]);
        $dataAksesFaskes = $validatedData->only(["akses_faskes"])->get("akses_faskes");
        $dataAksesTenagaKesehatan = $validatedData->only(["akses_tenaga_kesehatan"])->get("akses_tenaga_kesehatan");
        $dataSaranaPrasaranaTransportasi = $validatedData->only(["sarana_prasarana_transportasi"])->get("sarana_prasarana_transportasi");

        $dataKesehatankeluarga->put("keluarga_id", $keluarga->id);
        $kesehatanKeluarga = KesehatanKeluarga::create($dataKesehatankeluarga->toArray());

        foreach ($dataAksesFaskes as $jenisFaskesId => $aksesFaskes) {
            if (is_null($aksesFaskes["jarak_tempuh"]) && is_null($aksesFaskes["waktu_tempuh"]) && is_null($aksesFaskes["status"])) {
                unset($dataAksesFaskes[$jenisFaskesId]);
                continue;
            }

            $aksesFaskes["kesehatan_keluarga_id"] = $kesehatanKeluarga->id;
            $aksesFaskes["jenis_faskes_id"] = $jenisFaskesId;
            $dataAksesFaskes[] = $aksesFaskes;
            unset($dataAksesFaskes[$jenisFaskesId]);
        }
        AksesFaskes::insert($dataAksesFaskes);

        foreach ($dataAksesTenagaKesehatan as $jenisTenagaKesehatanId => $aksesTenagaKesehatan) {
            if (is_null($aksesTenagaKesehatan["jarak_tempuh"]) && is_null($aksesTenagaKesehatan["waktu_tempuh"]) && is_null($aksesTenagaKesehatan["status"])) {
                unset($dataAksesTenagaKesehatan[$jenisTenagaKesehatanId]);
                continue;
            }

            $aksesTenagaKesehatan["kesehatan_keluarga_id"] = $kesehatanKeluarga->id;
            $aksesTenagaKesehatan["jenis_tenaga_kesehatan_id"] = $jenisTenagaKesehatanId;
            $dataAksesTenagaKesehatan[] = $aksesTenagaKesehatan;
            unset($dataAksesTenagaKesehatan[$jenisTenagaKesehatanId]);
        }
        AksesTenagaKesehatan::insert($dataAksesTenagaKesehatan);

        foreach ($dataSaranaPrasaranaTransportasi as $tujuanTransportasiId => $saranaPrasaranaTransportasi) {
            if (is_null($saranaPrasaranaTransportasi["jenis_transportasi_terlama"]) && is_null($saranaPrasaranaTransportasi["penggunaan_transportasi_umum"]) && is_null($saranaPrasaranaTransportasi["waktu_tempuh"]) && is_null($saranaPrasaranaTransportasi["biaya"]) && is_null($saranaPrasaranaTransportasi["kemudahan"])) {
                unset($dataSaranaPrasaranaTransportasi[$tujuanTransportasiId]);
                continue;
            }

            $saranaPrasaranaTransportasi["kesehatan_keluarga_id"] = $kesehatanKeluarga->id;
            $saranaPrasaranaTransportasi["tujuan_transportasi_id"] = $tujuanTransportasiId;
            $dataSaranaPrasaranaTransportasi[] = $saranaPrasaranaTransportasi;
            unset($dataSaranaPrasaranaTransportasi[$tujuanTransportasiId]);
        }
        SaranaPrasaranaTransportasi::insert($dataSaranaPrasaranaTransportasi);

        $keluarga->update([
            "step" => "kesehatan",
        ]);

        return to_route("keluarga.enumerator.create", ["keluarga" => $keluarga->id]);
    }

    public function edit(Keluarga $keluarga)
    {
        // dd(KesehatanKeluarga::with(["list_akses_faskes", "list_sarana_prasarana_transportasi", "list_akses_tenaga_kesehatan"])->where("keluarga_id", $keluarga->id)->first()->toArray());
        return view("pages.keluarga.kesehatan.update", [
            "type_menu" => "",
            "title" => "Keluarga",
            "path" => "/keluarga/$keluarga->id/kesehatan",
            "data" => KesehatanKeluarga::with(["list_akses_faskes", "list_sarana_prasarana_transportasi", "list_akses_tenaga_kesehatan"])->where("keluarga_id", $keluarga->id)->first(),
            "dataJenisFaskes" => JenisFaskes::all(),
            "dataJenisTenagaKesehatan" => JenisTenagaKesehatan::all(),
            "dataTujuanTransportasi" => TujuanTransportasi::all(),
        ]);
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        $rules = [
            "keluarga_posyandu" => "required|in:ya,tidak",
            "bayi_gizi_baik" => "required|in:ya,tidak",
            "lansia_posyandu" => "required|in:ya,tidak",
            "keluarga_jaskesmas" => "required|in:ya,tidak",
            "akses_faskes.*.jarak_tempuh" => "nullable|numeric",
            "akses_faskes.*.waktu_tempuh" => "nullable|numeric",
            "akses_faskes.*.status" => "nullable|in:mudah,sulit",
            "akses_tenaga_kesehatan.*.jarak_tempuh" => "nullable|numeric",
            "akses_tenaga_kesehatan.*.waktu_tempuh" => "nullable|numeric",
            "akses_tenaga_kesehatan.*.status" => "nullable|in:mudah,sulit",
            "pus_kb" => "required|in:ya,tidak",
            "pus_tidak_kb" => "required|in:ya,tidak",
            "keluarga_bkb" => "required|in:ya,tidak",
            "keluarga_bkr" => "required|in:ya,tidak",
            "keluarga_bkl" => "required|in:ya,tidak",
            "keluarga_uppks" => "required|in:ya,tidak",
            "peserta_paguyuban" => "required|in:ya,tidak",
            "remaja_pikr" => "required|in:ya,tidak",
            "remaja_saka_kencana" => "required|in:ya,tidak",
            "sarana_prasarana_transportasi.*.jenis_transportasi_terlama" => "nullable|in:darat,air,udara",
            "sarana_prasarana_transportasi.*.penggunaan_transportasi_umum" => "nullable|in:ya,tidak",
            "sarana_prasarana_transportasi.*.waktu_tempuh" => "nullable|numeric",
            "sarana_prasarana_transportasi.*.biaya" => "nullable|numeric",
            "sarana_prasarana_transportasi.*.kemudahan" => "nullable|in:mudah,sulit",
            "blt" => "required|in:ya,tidak",
            "pkh" => "required|in:ya,tidak",
            "bst" => "required|in:ya,tidak",
            "banpres" => "required|in:ya,tidak",
            "bantuan_umkm" => "required|in:ya,tidak",
            "bantuan_pekerja" => "required|in:ya,tidak",
            "bantuan_pendidikan" => "required|in:ya,tidak",
            "bantuan_listrik" => "required|in:ya,tidak",
            "manfaat_pekarangan" => "required|in:ada,tidak",
            "keluarga_tani" => "required|in:ada,tidak",
            "keluarga_rukun_nelayan" => "required|in:ada,tidak",
        ];

        $validatedData = collect($request->validate($rules));

        $dataKesehatankeluarga = $validatedData->except(["akses_faskes", "akses_tenaga_kesehatan", "sarana_prasarana_transportasi"]);
        $dataAksesFaskes = $validatedData->only(["akses_faskes"])->get("akses_faskes");
        $dataAksesTenagaKesehatan = $validatedData->only(["akses_tenaga_kesehatan"])->get("akses_tenaga_kesehatan");
        $dataSaranaPrasaranaTransportasi = $validatedData->only(["sarana_prasarana_transportasi"])->get("sarana_prasarana_transportasi");

        $dataKesehatankeluarga->put("keluarga_id", $keluarga->id);
        $kesehatanKeluarga = KesehatanKeluarga::where("keluarga_id", $keluarga->id)->first();
        $kesehatanKeluarga->update(($dataKesehatankeluarga->toArray()));

        foreach ($dataAksesFaskes as $jenisFaskesId => $aksesFaskes) {
            if (is_null($aksesFaskes["jarak_tempuh"]) && is_null($aksesFaskes["waktu_tempuh"]) && is_null($aksesFaskes["status"])) {
                AksesFaskes::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("jenis_faskes_id", $jenisFaskesId)->delete();
                continue;
            }

            if (AksesFaskes::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("jenis_faskes_id", $jenisFaskesId)->get()->isEmpty()) {
                $aksesFaskes["kesehatan_keluarga_id"] = $kesehatanKeluarga->id;
                $aksesFaskes["jenis_faskes_id"] = $jenisFaskesId;
                AksesFaskes::create($aksesFaskes);
            } else {
                AksesFaskes::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("jenis_faskes_id", $jenisFaskesId)->update($aksesFaskes);
            }
        }

        foreach ($dataAksesTenagaKesehatan as $jenisTenagaKesehatanId => $aksesTenagaKesehatan) {
            if (is_null($aksesTenagaKesehatan["jarak_tempuh"]) && is_null($aksesTenagaKesehatan["waktu_tempuh"]) && is_null($aksesTenagaKesehatan["status"])) {
                AksesTenagaKesehatan::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("jenis_tenaga_kesehatan_id", $jenisTenagaKesehatanId)->delete();
                continue;
            }

            if (AksesTenagaKesehatan::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("jenis_tenaga_kesehatan_id", $jenisTenagaKesehatanId)->get()->isEmpty()) {
                $aksesTenagaKesehatan["kesehatan_keluarga_id"] = $kesehatanKeluarga->id;
                $aksesTenagaKesehatan["jenis_tenaga_kesehatan_id"] = $jenisTenagaKesehatanId;
                AksesTenagaKesehatan::create($aksesTenagaKesehatan);
            } else {
                AksesTenagaKesehatan::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("jenis_tenaga_kesehatan_id", $jenisTenagaKesehatanId)->update($aksesTenagaKesehatan);
            }
        }

        foreach ($dataSaranaPrasaranaTransportasi as $tujuanTransportasiId => $saranaPrasaranaTransportasi) {
            if (is_null($saranaPrasaranaTransportasi["jenis_transportasi_terlama"]) && is_null($saranaPrasaranaTransportasi["penggunaan_transportasi_umum"]) && is_null($saranaPrasaranaTransportasi["waktu_tempuh"]) && is_null($saranaPrasaranaTransportasi["biaya"]) && is_null($saranaPrasaranaTransportasi["kemudahan"])) {
                SaranaPrasaranaTransportasi::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("tujuan_transportasi_id", $tujuanTransportasiId)->delete();
                continue;
            }

            if (SaranaPrasaranaTransportasi::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("tujuan_transportasi_id", $tujuanTransportasiId)->get()->isEmpty()) {
                $saranaPrasaranaTransportasi["kesehatan_keluarga_id"] = $kesehatanKeluarga->id;
                $saranaPrasaranaTransportasi["tujuan_transportasi_id"] = $tujuanTransportasiId;
                SaranaPrasaranaTransportasi::create($saranaPrasaranaTransportasi);
            } else {
                SaranaPrasaranaTransportasi::where("kesehatan_keluarga_id", $kesehatanKeluarga->id)->where("tujuan_transportasi_id", $tujuanTransportasiId)->update($saranaPrasaranaTransportasi);
            }
        }

        return to_route("keluarga.enumerator.edit", ["keluarga" => $keluarga->id]);
    }
}
