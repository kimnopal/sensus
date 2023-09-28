<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\AkseptorKB;
use App\Models\HubunganKeluarga;
use App\Models\Individu;
use App\Models\Keluarga;
use App\Models\Suku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividuDeskripsiController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.individu.deskripsi.create", [
            "type_menu" => "",
            "title" => "Individu",
            "path" => "/deskripsi",
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

        // dd($validatedData->get("agama"));

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
            $agama = Agama::create(["nama" => $validatedData->agama_lainnya]);

            $validatedData->put("agama_id", $agama->id);

            $validatedData->forget("agama_lainnya");
        } else {
            $validatedData->put("agama_id", $validatedData->get("agama"));

            $validatedData->forget("agama");
        }

        if ($request->checkbox_hubungan_keluarga_lainnya) {
            $hubunganKeluarga = HubunganKeluarga::create(["nama" => $validatedData->hubungan_keluarga_lainnya]);

            $validatedData->put("hubungan_keluarga_id", $hubunganKeluarga->id);

            $validatedData->forget("hubungan_keluarga_lainnya");
        } else {
            $validatedData->put("hubungan_keluarga_id", $validatedData->get("hubungan_keluarga"));

            $validatedData->forget("hubungan_keluarga");
        }

        if ($request->checkbox_akseptor_kb_lainnya) {
            $akseptorKB = AkseptorKB::create(["nama" => $validatedData->akseptor_kb_lainnnya]);

            $validatedData->put("akseptor_kb_id", $akseptorKB->id);

            $validatedData->forget("akseptor_kb_lainnya");
        } else {
            $validatedData->put("akseptor_kb_id", $validatedData->get("akseptor_kb"));

            $validatedData->forget("akseptor_kb");
        }

        if ($request->checkbox_suku_lainnya) {
            $suku = Suku::create(["nama" => $validatedData->suku_lainnya]);

            $validatedData->put("suku_id", $suku->id);

            $validatedData->forget("suku_lainnya");
        } else {
            $validatedData->put("suku_id", $validatedData->get("suku"));

            $validatedData->forget("suku");
        }

        $dataIndividu = $validatedData->except(["status_pernikahan", "status_surat_nikah", "no_surat_nikah"]);
        $dataPernikahan = $validatedData->only(["status_pernikahan", "status_surat_nikah", "no_surat_nikah"]);

        // dd($dataPernikahan);

        $dataIndividu["step"] = "deskripsi";

        $individu = Individu::create($dataIndividu->toArray());

        $dataPernikahan["individu_id"] = $individu->id;
        $dataPernikahan["status_pernikahan_id"] = $dataPernikahan->get("status_pernikahan");
        $dataPernikahan->forget("status_pernikahan");

        // dd($dataPernikahan);
        DB::table("pernikahan")->insert($dataPernikahan->toArray());



        return to_route("individu.pekerjaan.create", ["id" => $individu->id]);
    }
}
