<?php

namespace App\Http\Controllers;

use App\Models\AdministrasiKependudukan;
use App\Models\Agama;
use App\Models\AkseptorKB;
use App\Models\HubunganKeluarga;
use App\Models\Individu;
use App\Models\Keluarga;
use App\Models\Pernikahan;
use App\Models\Suku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");

        return view("pages.individu.index", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/create/deskripsi",
            "datas" => Individu::where("nik", "LIKE", "%$search%")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.individu.deskripsi.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/deskripsi",
            "dataStatusPernikahan" => DB::table("status_pernikahan")->get(),
            "dataAgama" => Agama::all(),
            "dataHubunganKeluarga" => HubunganKeluarga::all(),
            "dataAkseptorKB" => AkseptorKB::all(),
            "dataSuku" => Suku::all(),
        ]);
    }

    public function store(Request $request)
    {
        $rules = ([
            "nama" => "required|max:100",
            "nik" => "required|unique:individu,nik",
            "no_kk" => "required",
            "jenis_kelamin" => "required|in:laki-laki,perempuan",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required|date",
            "status_pernikahan" => "required|exists:status_pernikahan,id",
            "status_surat_nikah" => "required|in:ya,tidak",
            "no_surat_nikah" => "nullable|max:100",
            "golongan_darah" => "required|in:o,a,b,ab",
            "nama_ortu" => "required|max:100",
            "warganegara" => "required|in:wni,wna",
            "no_hp" => "required|max:50",
            "no_wa" => "required|max:50",
            "email" => "required|max:50",
            "facebook" => "required|max:100",
            "twitter" => "required|max:50",
            "instagram" => "required|max:50",
            "status_ktp_kia" => "required|in:ya,tidak",
            "status_akta_kelahiran" => "required|in:ya,tidak",
            "no_akta_kelahiran" => "nullable",
        ]);

        if ($request->checkbox_agama_lainnya) {
            $rules["agama_lainnya"] = "required|max:50";
        } else {
            $rules["agama"] = "required|exists:agama,id";
        }

        if ($request->checkbox_hubungan_keluarga_lainnya) {
            $rules["hubungan_keluarga_lainnya"] = "required|max:50";
        } else {
            $rules["hubungan_keluarga"] = "required|exists:hubungan_keluarga,id";
        }

        if ($request->checkbox_akseptor_kb_lainnya) {
            $rules["akseptor_kb_lainnya"] = "required|max:50";
        } else {
            $rules["akseptor_kb"] = "required|exists:akseptor_kb,id";
        }

        if ($request->checkbox_suku_lainnya) {
            $rules["suku_lainnya"] = "required|max:50";
        } else {
            $rules["suku"] = "required|exists:suku,id";
        }

        $validatedData = collect($request->validate($rules));

        if (Keluarga::where("no_kk", $request->no_kk)->get()->isEmpty()) {
            Keluarga::create([
                'provinsi' => 'jawa barat',
                'kabupaten' => 'pangandaran',
                'kecamatan' => 'cijulang',
                'desa' => 'batukaras',
                'no_kk' => $request->no_kk,
            ]);
        }

        if ($request->checkbox_agama_lainnya) {
            $agama = Agama::create(["nama" => $validatedData->get("agama_lainnya")]);

            $validatedData->put("agama_id", $agama->id);

            $validatedData->forget("agama_lainnya");
        } else {
            $validatedData->put("agama_id", $validatedData->get("agama"));

            $validatedData->forget("agama");
        }

        if ($request->checkbox_hubungan_keluarga_lainnya) {
            $hubunganKeluarga = HubunganKeluarga::create(["nama" => $validatedData->get("hubungan_keluarga_lainnya")]);

            $validatedData->put("hubungan_keluarga_id", $hubunganKeluarga->id);

            $validatedData->forget("hubungan_keluarga_lainnya");
        } else {
            $validatedData->put("hubungan_keluarga_id", $validatedData->get("hubungan_keluarga"));

            $validatedData->forget("hubungan_keluarga");
        }

        if ($request->checkbox_akseptor_kb_lainnya) {
            $akseptorKB = AkseptorKB::create(["nama" => $validatedData->get("akseptor_kb_lainnya")]);

            $validatedData->put("akseptor_kb_id", $akseptorKB->id);

            $validatedData->forget("akseptor_kb_lainnya");
        } else {
            $validatedData->put("akseptor_kb_id", $validatedData->get("akseptor_kb"));

            $validatedData->forget("akseptor_kb");
        }

        if ($request->checkbox_suku_lainnya) {
            $suku = Suku::create(["nama" => $validatedData->get("suku_lainnya")]);

            $validatedData->put("suku_id", $suku->id);

            $validatedData->forget("suku_lainnya");
        } else {
            $validatedData->put("suku_id", $validatedData->get("suku"));

            $validatedData->forget("suku");
        }

        $dataIndividu = $validatedData->except(["status_pernikahan", "status_surat_nikah", "no_surat_nikah", "status_ktp_kia", "status_akta_kelahiran", "no_akta"]);
        $dataPernikahan = $validatedData->only(["status_pernikahan", "status_surat_nikah", "no_surat_nikah"]);
        $dataKependudukan = $validatedData->only(["status_ktp_kia", "status_akta_kelahiran", "no_akta_kelahiran"]);

        $dataIndividu["step"] = "deskripsi";

        $individu = Individu::create($dataIndividu->toArray());

        $dataPernikahan["individu_id"] = $individu->id;
        $dataPernikahan["status_pernikahan_id"] = $dataPernikahan->get("status_pernikahan");
        $dataPernikahan->forget("status_pernikahan");

        Pernikahan::create($dataPernikahan->toArray());

        $dataKependudukan["individu_id"] = $individu->id;

        AdministrasiKependudukan::create($dataKependudukan->toArray());

        return to_route("individu.pekerjaan.create", ["individu" => $individu->id]);
    }

    public function edit(Individu $individu)
    {
        return view("pages.individu.deskripsi.update", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/individu/$individu->id/deskripsi",
            "data" => Individu::with(["agama", "hubungan_keluarga", "akseptor_kb", "pernikahan", "administrasi_kependudukan"])->find($individu->id),
            "dataStatusPernikahan" => DB::table("status_pernikahan")->get(),
            "dataAgama" => Agama::all(),
            "dataHubunganKeluarga" => HubunganKeluarga::all(),
            "dataAkseptorKB" => AkseptorKB::all(),
            "dataSuku" => Suku::all(),
        ]);
    }

    public function update(Request $request, Individu $individu)
    {
        $rules = [
            "nama" => "required|max:100",
            "no_kk" => "required",
            "jenis_kelamin" => "required|in:laki-laki,perempuan",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required|date",
            "status_pernikahan" => "required|exists:status_pernikahan,id",
            "status_surat_nikah" => "required|in:ya,tidak",
            "no_surat_nikah" => "nullable|max:100",
            "golongan_darah" => "required|in:o,a,b,ab",
            "nama_ortu" => "required|max:100",
            "warganegara" => "required|in:wni,wna",
            "no_hp" => "required|max:50",
            "no_wa" => "required|max:50",
            "email" => "required|max:50",
            "facebook" => "required|max:100",
            "twitter" => "required|max:50",
            "instagram" => "required|max:50",
            "status_ktp_kia" => "required|in:ya,tidak",
            "status_akta_kelahiran" => "required|in:ya,tidak",
            "no_akta_kelahiran" => "nullable",
        ];

        if ($request->nik != $individu->nik) {
            $rules["nik"] = "required|unique:individu,nik";
        }

        if ($request->checkbox_agama_lainnya) {
            $rules["agama_lainnya"] = "required|max:50";
        } else {
            $rules["agama"] = "required|exists:agama,id";
        }

        if ($request->checkbox_hubungan_keluarga_lainnya) {
            $rules["hubungan_keluarga_lainnya"] = "required|max:50";
        } else {
            $rules["hubungan_keluarga"] = "required|exists:hubungan_keluarga,id";
        }

        if ($request->checkbox_akseptor_kb_lainnya) {
            $rules["akseptor_kb_lainnya"] = "required|max:50";
        } else {
            $rules["akseptor_kb"] = "required|exists:akseptor_kb,id";
        }

        if ($request->checkbox_suku_lainnya) {
            $rules["suku_lainnya"] = "required|max:50";
        } else {
            $rules["suku"] = "required|exists:suku,id";
        }

        $validatedData = collect($request->validate($rules));

        if (Keluarga::where("no_kk", $request->no_kk)->get()->isEmpty()) {
            Keluarga::create([
                'provinsi' => 'jawa barat',
                'kabupaten' => 'pangandaran',
                'kecamatan' => 'cijulang',
                'desa' => 'batukaras',
                'no_kk' => $request->no_kk,
            ]);
        }

        if ($request->checkbox_agama_lainnya) {
            $agama = Agama::create(["nama" => $validatedData->get("agama_lainnya")]);

            $validatedData->put("agama_id", $agama->id);

            $validatedData->forget("agama_lainnya");
        } else {
            $validatedData->put("agama_id", $validatedData->get("agama"));

            $validatedData->forget("agama");
        }

        if ($request->checkbox_hubungan_keluarga_lainnya) {
            $hubunganKeluarga = HubunganKeluarga::create(["nama" => $validatedData->get("hubungan_keluarga_lainnya")]);

            $validatedData->put("hubungan_keluarga_id", $hubunganKeluarga->id);

            $validatedData->forget("hubungan_keluarga_lainnya");
        } else {
            $validatedData->put("hubungan_keluarga_id", $validatedData->get("hubungan_keluarga"));

            $validatedData->forget("hubungan_keluarga");
        }

        if ($request->checkbox_akseptor_kb_lainnya) {
            $akseptorKB = AkseptorKB::create(["nama" => $validatedData->get("akseptor_kb_lainnya")]);

            $validatedData->put("akseptor_kb_id", $akseptorKB->id);

            $validatedData->forget("akseptor_kb_lainnya");
        } else {
            $validatedData->put("akseptor_kb_id", $validatedData->get("akseptor_kb"));

            $validatedData->forget("akseptor_kb");
        }

        if ($request->checkbox_suku_lainnya) {
            $suku = Suku::create(["nama" => $validatedData->get("suku_lainnya")]);

            $validatedData->put("suku_id", $suku->id);

            $validatedData->forget("suku_lainnya");
        } else {
            $validatedData->put("suku_id", $validatedData->get("suku"));

            $validatedData->forget("suku");
        }

        $dataIndividu = $validatedData->except(["status_pernikahan", "status_surat_nikah", "no_surat_nikah", "status_ktp_kia", "status_akta_kelahiran", "no_akta_kelahiran"]);
        $dataPernikahan = $validatedData->only(["status_pernikahan", "status_surat_nikah", "no_surat_nikah"]);
        $dataKependudukan = $validatedData->only(["status_ktp_kia", "status_akta_kelahiran", "no_akta_kelahiran"]);

        $individuId = Individu::where("id", $individu->id)->update($dataIndividu->toArray());

        $dataPernikahan["individu_id"] = $individuId;
        $dataPernikahan["status_pernikahan_id"] = $dataPernikahan->get("status_pernikahan");
        $dataPernikahan->forget("status_pernikahan");

        Pernikahan::where("individu_id", $individuId)->update($dataPernikahan->toArray());

        $dataKependudukan["individu_id"] = $individuId;

        AdministrasiKependudukan::where("individu_id", $individuId)->update($dataKependudukan->toArray());

        return to_route("individu.pekerjaan.edit", ["individu" => $individu->id]);
    }
}
