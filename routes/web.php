<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AkseptorKBController;
use App\Http\Controllers\DisabilitasController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\HubunganKeluargaController;
use App\Http\Controllers\IndividuController;
use App\Http\Controllers\IndividuKesehatanController;
use App\Http\Controllers\IndividuPekerjaanController;
use App\Http\Controllers\IndividuPendidikanController;
use App\Http\Controllers\JenisAtapController;
use App\Http\Controllers\JenisDindingController;
use App\Http\Controllers\JenisEnergiMemasakController;
use App\Http\Controllers\JenisLantaiController;
use App\Http\Controllers\JenisPeneranganController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KeluargaEnumeratorController;
use App\Http\Controllers\KeluargaKesehatanController;
use App\Http\Controllers\KeluargaPendidikanController;
use App\Http\Controllers\KeluargaPermukimanController;
use App\Http\Controllers\PekerjaanUtamaController;
use App\Http\Controllers\PembuanganLimbahController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StatusLahanController;
use App\Http\Controllers\StatusRumahController;
use App\Http\Controllers\SukuController;
use App\Http\Controllers\SumberAirMandiController;
use App\Http\Controllers\SumberAirMinumController;
use App\Http\Controllers\SumberKayuController;
use App\Http\Controllers\SumberPenghasilanController;
use App\Http\Controllers\TingkatPendidikanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/dashboard-general-dashboard');

// Master Data
// Route::get('/dusun', [DusunController::class, "index"]);
// individu
Route::resource("/dusun", DusunController::class)->except(["show"]);
Route::resource("/rt", RTController::class)->except(["show"]);
Route::resource("/rw", RWController::class)->except(["show"]);
Route::resource("/agama", AgamaController::class)->except(["show"]);
Route::resource("/akseptor_kb", AkseptorKBController::class)->except(["show"])->parameters(["akseptor_kb" => "akseptorKB"]);
Route::resource("/hubungan_keluarga", HubunganKeluargaController::class)->except(["show"])->parameters(["hubungan_keluarga" => "hubunganKeluarga"]);
Route::resource("/suku", SukuController::class)->except(["show"]);
Route::resource("/pekerjaan_utama", PekerjaanUtamaController::class)->except(["show"]);
Route::resource("/satuan", SatuanController::class)->except(["show"]);
Route::resource("/sumber_penghasilan", SumberPenghasilanController::class)->except(["show"]);
Route::resource("/penyakit", PenyakitController::class)->except(["show"]);
Route::resource("/faskes", FaskesController::class)->except(["show"])->parameters(["faskes" => "faskes"]);
Route::resource("/disabilitas", DisabilitasController::class)->except(["show"])->parameters(["disabilitas" => "disabilitas"]);
Route::resource("/tingkat_pendidikan", TingkatPendidikanController::class)->except(["show"]);

// keluarga
Route::resource("/status_rumah", StatusRumahController::class)->except(["show"]);
Route::resource("/status_lahan", StatusLahanController::class)->except(["show"]);
Route::resource("/jenis_lantai", JenisLantaiController::class)->except(["show"]);
Route::resource("/jenis_dinding", JenisDindingController::class)->except(["show"]);
Route::resource("/jenis_atap", JenisAtapController::class)->except(["show"]);
Route::resource("/jenis_penerangan", JenisPeneranganController::class)->except(["show"]);
Route::resource("/jenis_energi_memasak", JenisEnergiMemasakController::class)->except(["show"]);
Route::resource("/sumber_kayu", SumberKayuController::class)->except(["show"]);
Route::resource("/sumber_air_mandi", SumberAirMandiController::class)->except(["show"]);
Route::resource("/sumber_air_minum", SumberAirMinumController::class)->except(["show"]);
Route::resource("/pembuangan_limbah", PembuanganLimbahController::class)->except(["show"]);

// Keluarga
Route::get("/keluarga", [KeluargaController::class, "index"]);
Route::delete("/keluarga/{keluarga}", [KeluargaController::class, "destroy"]);

Route::get("/keluarga/create/deskripsi", [KeluargaController::class, "create"])->name("keluarga.deskripsi.create");
Route::post("/keluarga/deskripsi", [KeluargaController::class, "store"])->name("keluarga.deskripsi.store");
Route::get("/keluarga/{keluarga}/edit/deskripsi", [KeluargaController::class, "edit"])->name("keluarga.deskripsi.edit");
Route::put("/keluarga/{keluarga}/deskripsi", [KeluargaController::class, "update"])->name("keluarga.deskripsi.update");

Route::get("/keluarga/create/{keluarga}/permukiman", [KeluargaPermukimanController::class, "create"])->name("keluarga.permukiman.create");
Route::post("/keluarga/{keluarga}/permukiman", [KeluargaPermukimanController::class, "store"])->name("keluarga.permukiman.store");
Route::get("/keluarga/{keluarga}/edit/permukiman", [KeluargaPermukimanController::class, "edit"])->name("keluarga.permukiman.edit");
Route::put("/keluarga/{keluarga}/permukiman", [KeluargaPermukimanController::class, "update"])->name("keluarga.permukiman.update");

Route::get("/keluarga/create/{keluarga}/pendidikan", [KeluargaPendidikanController::class, "create"])->name("keluarga.pendidikan.create");
Route::post("/keluarga/{keluarga}/pendidikan", [KeluargaPendidikanController::class, "store"])->name("keluarga.pendidikan.store");
Route::get("/keluarga/{keluarga}/edit/pendidikan", [KeluargaPendidikanController::class, "edit"])->name("keluarga.pendidikan.edit");
Route::put("/keluarga/{keluarga}/pendidikan", [KeluargaPendidikanController::class, "update"])->name("keluarga.pendidikan.update");

Route::get("/keluarga/create/{keluarga}/kesehatan", [KeluargaKesehatanController::class, "create"])->name("keluarga.kesehatan.create");
Route::post("/keluarga/{keluarga}/kesehatan", [KeluargaKesehatanController::class, "store"])->name("keluarga.kesehatan.store");
Route::get("/keluarga/{keluarga}/edit/kesehatan", [KeluargaKesehatanController::class, "edit"])->name("keluarga.kesehatan.edit");
Route::put("/keluarga/{keluarga}/kesehatan", [KeluargaKesehatanController::class, "update"])->name("keluarga.kesehatan.update");

Route::get("/keluarga/create/{keluarga}/enumerator", [KeluargaEnumeratorController::class, "create"])->name("keluarga.enumerator.create");
Route::post("/keluarga/{keluarga}/enumerator", [KeluargaEnumeratorController::class, "store"])->name("keluarga.enumerator.store");
Route::get("/keluarga/{keluarga}/edit/enumerator", [KeluargaEnumeratorController::class, "edit"])->name("keluarga.enumerator.edit");
Route::put("/keluarga/{keluarga}/enumerator", [KeluargaEnumeratorController::class, "update"])->name("keluarga.enumerator.update");
// Route::resource("/keluarga", KeluargaController::class);

// Individu
Route::get("/individu", [IndividuController::class, "index"]);
Route::delete("/individu/{individu}", [IndividuController::class, "destroy"]);

Route::get("/individu/create/deskripsi", [IndividuController::class, "create"])->name("individu.deskripsi.create");
Route::post("/individu/deskripsi", [IndividuController::class, "store"])->name("individu.deskripsi.store");
Route::get("/individu/{individu}/edit/deskripsi", [IndividuController::class, "edit"])->name("individu.deskripsi.edit");
Route::put("/individu/{individu}/deskripsi", [IndividuController::class, "update"])->name("individu.deskripsi.update");

Route::get("/individu/create/{individu}/pekerjaan", [IndividuPekerjaanController::class, "create"])->name("individu.pekerjaan.create");
Route::post("/individu/{individu}/pekerjaan", [IndividuPekerjaanController::class, "store"])->name("individu.pekerjaan.store");
Route::get("/individu/{individu}/edit/pekerjaan", [IndividuPekerjaanController::class, "edit"])->name("individu.pekerjaan.edit");
Route::put("/individu/{individu}/pekerjaan", [IndividuPekerjaanController::class, "update"])->name("individu.pekerjaan.update");

Route::get("/individu/create/{individu}/kesehatan", [IndividuKesehatanController::class, "create"])->name("individu.kesehatan.create");
Route::post("/individu/{individu}/kesehatan", [IndividuKesehatanController::class, "store"])->name("individu.kesehatan.store");
Route::get("/individu/{individu}/edit/kesehatan", [IndividuKesehatanController::class, "edit"])->name("individu.kesehatan.edit");
Route::put("/individu/{individu}/kesehatan", [IndividuKesehatanController::class, "update"])->name("individu.kesehatan.update");

Route::get("/individu/create/{individu}/pendidikan", [IndividuPendidikanController::class, "create"])->name("individu.pendidikan.create");
Route::post("/individu/{individu}/pendidikan", [IndividuPendidikanController::class, "store"])->name("individu.pendidikan.store");
Route::get("/individu/{individu}/edit/pendidikan", [IndividuPendidikanController::class, "edit"])->name("individu.pendidikan.edit");
Route::put("/individu/{individu}/pendidikan", [IndividuPendidikanController::class, "update"])->name("individu.pendidikan.update");


// Dashboard
Route::get('/dashboard-general-dashboard', function () {
    return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
});
Route::get('/dashboard-ecommerce-dashboard', function () {
    return view('pages.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});


// Layout
Route::get('/layout-default-layout', function () {
    return view('pages.layout-default-layout', ['type_menu' => 'layout']);
});

// Blank Page
Route::get('/blank-page', function () {
    return view('pages.blank-page', ['type_menu' => '']);
});

// Bootstrap
Route::get('/bootstrap-alert', function () {
    return view('pages.bootstrap-alert', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-badge', function () {
    return view('pages.bootstrap-badge', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-breadcrumb', function () {
    return view('pages.bootstrap-breadcrumb', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-buttons', function () {
    return view('pages.bootstrap-buttons', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-card', function () {
    return view('pages.bootstrap-card', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-carousel', function () {
    return view('pages.bootstrap-carousel', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-collapse', function () {
    return view('pages.bootstrap-collapse', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-dropdown', function () {
    return view('pages.bootstrap-dropdown', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-form', function () {
    return view('pages.bootstrap-form', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-list-group', function () {
    return view('pages.bootstrap-list-group', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-media-object', function () {
    return view('pages.bootstrap-media-object', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-modal', function () {
    return view('pages.bootstrap-modal', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-nav', function () {
    return view('pages.bootstrap-nav', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-navbar', function () {
    return view('pages.bootstrap-navbar', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-pagination', function () {
    return view('pages.bootstrap-pagination', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-popover', function () {
    return view('pages.bootstrap-popover', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-progress', function () {
    return view('pages.bootstrap-progress', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-table', function () {
    return view('pages.bootstrap-table', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-tooltip', function () {
    return view('pages.bootstrap-tooltip', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-typography', function () {
    return view('pages.bootstrap-typography', ['type_menu' => 'bootstrap']);
});


// components
Route::get('/components-article', function () {
    return view('pages.components-article', ['type_menu' => 'components']);
});
Route::get('/components-avatar', function () {
    return view('pages.components-avatar', ['type_menu' => 'components']);
});
Route::get('/components-chat-box', function () {
    return view('pages.components-chat-box', ['type_menu' => 'components']);
});
Route::get('/components-empty-state', function () {
    return view('pages.components-empty-state', ['type_menu' => 'components']);
});
Route::get('/components-gallery', function () {
    return view('pages.components-gallery', ['type_menu' => 'components']);
});
Route::get('/components-hero', function () {
    return view('pages.components-hero', ['type_menu' => 'components']);
});
Route::get('/components-multiple-upload', function () {
    return view('pages.components-multiple-upload', ['type_menu' => 'components']);
});
Route::get('/components-pricing', function () {
    return view('pages.components-pricing', ['type_menu' => 'components']);
});
Route::get('/components-statistic', function () {
    return view('pages.components-statistic', ['type_menu' => 'components']);
});
Route::get('/components-tab', function () {
    return view('pages.components-tab', ['type_menu' => 'components']);
});
Route::get('/components-table', function () {
    return view('pages.components-table', ['type_menu' => 'components']);
});
Route::get('/components-user', function () {
    return view('pages.components-user', ['type_menu' => 'components']);
});
Route::get('/components-wizard', function () {
    return view('pages.components-wizard', ['type_menu' => 'components']);
});

// forms
Route::get('/forms-advanced-form', function () {
    return view('pages.forms-advanced-form', ['type_menu' => 'forms']);
});
Route::get('/forms-editor', function () {
    return view('pages.forms-editor', ['type_menu' => 'forms']);
});
Route::get('/forms-validation', function () {
    return view('pages.forms-validation', ['type_menu' => 'forms']);
});

// google maps
// belum tersedia

// modules
Route::get('/modules-calendar', function () {
    return view('pages.modules-calendar', ['type_menu' => 'modules']);
});
Route::get('/modules-chartjs', function () {
    return view('pages.modules-chartjs', ['type_menu' => 'modules']);
});
Route::get('/modules-datatables', function () {
    return view('pages.modules-datatables', ['type_menu' => 'modules']);
});
Route::get('/modules-flag', function () {
    return view('pages.modules-flag', ['type_menu' => 'modules']);
});
Route::get('/modules-font-awesome', function () {
    return view('pages.modules-font-awesome', ['type_menu' => 'modules']);
});
Route::get('/modules-ion-icons', function () {
    return view('pages.modules-ion-icons', ['type_menu' => 'modules']);
});
Route::get('/modules-owl-carousel', function () {
    return view('pages.modules-owl-carousel', ['type_menu' => 'modules']);
});
Route::get('/modules-sparkline', function () {
    return view('pages.modules-sparkline', ['type_menu' => 'modules']);
});
Route::get('/modules-sweet-alert', function () {
    return view('pages.modules-sweet-alert', ['type_menu' => 'modules']);
});
Route::get('/modules-toastr', function () {
    return view('pages.modules-toastr', ['type_menu' => 'modules']);
});
Route::get('/modules-vector-map', function () {
    return view('pages.modules-vector-map', ['type_menu' => 'modules']);
});
Route::get('/modules-weather-icon', function () {
    return view('pages.modules-weather-icon', ['type_menu' => 'modules']);
});

// auth
Route::get('/auth-forgot-password', function () {
    return view('pages.auth-forgot-password', ['type_menu' => 'auth']);
});
Route::get('/auth-login', function () {
    return view('pages.auth-login', ['type_menu' => 'auth']);
});
Route::get('/auth-login2', function () {
    return view('pages.auth-login2', ['type_menu' => 'auth']);
});
Route::get('/auth-register', function () {
    return view('pages.auth-register', ['type_menu' => 'auth']);
});
Route::get('/auth-reset-password', function () {
    return view('pages.auth-reset-password', ['type_menu' => 'auth']);
});

// error
Route::get('/error-403', function () {
    return view('pages.error-403', ['type_menu' => 'error']);
});
Route::get('/error-404', function () {
    return view('pages.error-404', ['type_menu' => 'error']);
});
Route::get('/error-500', function () {
    return view('pages.error-500', ['type_menu' => 'error']);
});
Route::get('/error-503', function () {
    return view('pages.error-503', ['type_menu' => 'error']);
});

// features
Route::get('/features-activities', function () {
    return view('pages.features-activities', ['type_menu' => 'features']);
});
Route::get('/features-post-create', function () {
    return view('pages.features-post-create', ['type_menu' => 'features']);
});
Route::get('/features-post', function () {
    return view('pages.features-post', ['type_menu' => 'features']);
});
Route::get('/features-profile', function () {
    return view('pages.features-profile', ['type_menu' => 'features']);
});
Route::get('/features-settings', function () {
    return view('pages.features-settings', ['type_menu' => 'features']);
});
Route::get('/features-setting-detail', function () {
    return view('pages.features-setting-detail', ['type_menu' => 'features']);
});
Route::get('/features-tickets', function () {
    return view('pages.features-tickets', ['type_menu' => 'features']);
});

// utilities
Route::get('/utilities-contact', function () {
    return view('pages.utilities-contact', ['type_menu' => 'utilities']);
});
Route::get('/utilities-invoice', function () {
    return view('pages.utilities-invoice', ['type_menu' => 'utilities']);
});
Route::get('/utilities-subscribe', function () {
    return view('pages.utilities-subscribe', ['type_menu' => 'utilities']);
});

// credits
Route::get('/credits', function () {
    return view('pages.credits', ['type_menu' => '']);
});
