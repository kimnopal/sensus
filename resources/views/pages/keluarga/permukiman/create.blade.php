@extends('pages.layouts.create')

@section('timeline')
    @include('pages.keluarga.timeline', ['operation' => 'create'])
@endsection

@section('form_field')
    {{-- status rumah --}}
    <div class="form-group">
        <label>Tempat tinggal yang ditempati</label>
        <select class="form-control @error('status_rumah') is-invalid @enderror" name="status_rumah" id="selectStatusRumah"
            @if (old('checkbox_status_rumah_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Status Rumah</option>
            @foreach ($dataStatusRumah as $statusRumah)
                <option value="{{ $statusRumah->id }}" @selected(old('status_rumah') == $statusRumah->id)>{{ $statusRumah->status }}
                </option>
            @endforeach
        </select>
        @error('status_rumah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxStatusRumahLainnya"
                    name="checkbox_status_rumah_lainnya" value="true" @checked(old('checkbox_status_rumah_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxStatusRumahLainnya">Status Rumah Lainnya</label>
            </div>
            <input type="text" id="inputStatusRumahLainnya"
                class="form-control mt-1 @error('status_rumah_lainnya') is-invalid @enderror" name="status_rumah_lainnya"
                value="{{ old('status_rumah_lainnya') }}" @if (old('checkbox_status_rumah_lainnya') != 'true') disabled="true" @endif>
            @error('status_rumah_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- status lahan --}}
    <div class="form-group">
        <label>Status lahan tempat tinggal yang ditempati</label>
        <select class="form-control @error('status_lahan') is-invalid @enderror" name="status_lahan" id="selectStatusLahan"
            @if (old('checkbox_status_lahan_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Status Lahan</option>
            @foreach ($dataStatusLahan as $statusLahan)
                <option value="{{ $statusLahan->id }}" @selected(old('status_lahan') == $statusLahan->id)>{{ $statusLahan->status }}
                </option>
            @endforeach
        </select>
        @error('status_lahan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxStatusLahanLainnya"
                    name="checkbox_status_lahan_lainnya" value="true" @checked(old('checkbox_status_lahan_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxStatusLahanLainnya">Status Lahan Lainnya</label>
            </div>
            <input type="text" id="inputStatusLahanLainnya"
                class="form-control mt-1 @error('status_lahan_lainnya') is-invalid @enderror" name="status_lahan_lainnya"
                value="{{ old('status_lahan_lainnya') }}" @if (old('checkbox_status_lahan_lainnya') != 'true') disabled="true" @endif>
            @error('status_lahan_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- luas lantai --}}
    <div class="form-group">
        <label>Luas Lantai tempat tinggal</label>
        <div class="input-group @error('luas_lantai') is-invalid @enderror">
            <input type="text" class="form-control @error('luas_lantai') is-invalid @enderror" name="luas_lantai"
                value="{{ old('luas_lantai') }}">
            <div class="input-group-append">
                <span class="input-group-text">m2</span>
            </div>
        </div>
        @error('luas_lantai')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- luas lahan --}}
    <div class="form-group">
        <label>Luas Lahan tempat tinggal</label>
        <div class="input-group @error('luas_lahan') is-invalid @enderror">
            <input type="text" class="form-control @error('luas_lahan') is-invalid @enderror" name="luas_lahan"
                value="{{ old('luas_lahan') }}">
            <div class="input-group-append">
                <span class="input-group-text">m2</span>
            </div>
        </div>
        @error('luas_lahan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- jenis lantai --}}
    <div class="form-group">
        <label>Jenis lantai tempat tinggal terluas</label>
        <select class="form-control @error('jenis_lantai') is-invalid @enderror" name="jenis_lantai" id="selectJenisLantai"
            @if (old('checkbox_jenis_lantai_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Jenis Lantai</option>
            @foreach ($dataJenisLantai as $jenisLantai)
                <option value="{{ $jenisLantai->id }}" @selected(old('jenis_lantai') == $jenisLantai->id)>{{ $jenisLantai->jenis }}
                </option>
            @endforeach
        </select>
        @error('jenis_lantai')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxJenisLantaiLainnya"
                    name="checkbox_jenis_lantai_lainnya" value="true" @checked(old('checkbox_jenis_lantai_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxJenisLantaiLainnya">Jenis Lantai Lainnya</label>
            </div>
            <input type="text" id="inputJenisLantaiLainnya"
                class="form-control mt-1 @error('jenis_lantai_lainnya') is-invalid @enderror" name="jenis_lantai_lainnya"
                value="{{ old('jenis_lantai_lainnya') }}" @if (old('checkbox_jenis_lantai_lainnya') != 'true') disabled="true" @endif>
            @error('jenis_lantai_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- jenis dinding --}}
    <div class="form-group">
        <label>Dinding sebagian besar rumah</label>
        <select class="form-control @error('jenis_dinding') is-invalid @enderror" name="jenis_dinding"
            id="selectJenisDinding" @if (old('checkbox_jenis_dinding_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Jenis Dinding</option>
            @foreach ($dataJenisDinding as $jenisDinding)
                <option value="{{ $jenisDinding->id }}" @selected(old('jenis_dinding') == $jenisDinding->id)>{{ $jenisDinding->jenis }}
                </option>
            @endforeach
        </select>
        @error('jenis_dinding')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxJenisDindingLainnya"
                    name="checkbox_jenis_dinding_lainnya" value="true" @checked(old('checkbox_jenis_dinding_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxJenisDindingLainnya">Jenis Dinding Lainnya</label>
            </div>
            <input type="text" id="inputJenisDindingLainnya"
                class="form-control mt-1 @error('jenis_dinding_lainnya') is-invalid @enderror"
                name="jenis_dinding_lainnya" value="{{ old('jenis_dinding_lainnya') }}"
                @if (old('checkbox_jenis_dinding_lainnya') != 'true') disabled="true" @endif>
            @error('jenis_dinding_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- status jendela --}}
    <div class="form-group">
        <label>Jendela</label>
        <select class="form-control @error('status_jendela') is-invalid @enderror" name="status_jendela">
            <option value="" selected>Pilih Status Jendela</option>
            <option value="berfungsi" @selected(old('status_jendela') == 'berfungsi')>Ada, berfungsi</option>
            <option value="tidak berfungsi" @selected(old('status_jendela') == 'tidak berfungsi')>Ada, tidak berfungsi</option>
            <option value="tidak ada" @selected(old('status_jendela') == 'tidak ada')>Tidak ada</option>
        </select>
        @error('status_jendela')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- jenis atap --}}
    <div class="form-group">
        <label>Atap</label>
        <select class="form-control @error('jenis_atap') is-invalid @enderror" name="jenis_atap" id="selectJenisAtap"
            @if (old('checkbox_jenis_atap_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Jenis Atap</option>
            @foreach ($dataJenisAtap as $jenisAtap)
                <option value="{{ $jenisAtap->id }}" @selected(old('jenis_atap') == $jenisAtap->id)>{{ $jenisAtap->jenis }}
                </option>
            @endforeach
        </select>
        @error('jenis_atap')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxJenisAtapLainnya"
                    name="checkbox_jenis_atap_lainnya" value="true" @checked(old('checkbox_jenis_atap_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxJenisAtapLainnya">Jenis Atap Lainnya</label>
            </div>
            <input type="text" id="inputJenisAtapLainnya"
                class="form-control mt-1 @error('jenis_atap_lainnya') is-invalid @enderror" name="jenis_atap_lainnya"
                value="{{ old('jenis_atap_lainnya') }}" @if (old('checkbox_jenis_atap_lainnya') != 'true') disabled="true" @endif>
            @error('jenis_atap_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- jenis penerangan --}}
    <div class="form-group">
        <label>Penerangan rumah</label>
        <select class="form-control @error('jenis_penerangan') is-invalid @enderror" name="jenis_penerangan"
            id="selectJenisPenerangan" @if (old('checkbox_jenis_penerangan_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Jenis Penerangan</option>
            @foreach ($dataJenisPenerangan as $jenisPenerangan)
                <option value="{{ $jenisPenerangan->id }}" @selected(old('jenis_penerangan') == $jenisPenerangan->id)>{{ $jenisPenerangan->jenis }}
                </option>
            @endforeach
        </select>
        @error('jenis_penerangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxJenisPeneranganLainnya"
                    name="checkbox_jenis_penerangan_lainnya" value="true" @checked(old('checkbox_jenis_penerangan_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxJenisPeneranganLainnya">Jenis Penerangan Lainnya</label>
            </div>
            <input type="text" id="inputJenisPeneranganLainnya"
                class="form-control mt-1 @error('jenis_penerangan_lainnya') is-invalid @enderror"
                name="jenis_penerangan_lainnya" value="{{ old('jenis_penerangan_lainnya') }}"
                @if (old('checkbox_jenis_penerangan_lainnya') != 'true') disabled="true" @endif>
            @error('jenis_penerangan_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- jenis energi memasak --}}
    <div class="form-group">
        <label>Energi untuk memasak</label>
        <select class="form-control @error('jenis_energi_memasak') is-invalid @enderror" name="jenis_energi_memasak"
            id="selectJenisEnergiMemasak" @if (old('checkbox_jenis_energi_memasak_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Jenis Energi</option>
            @foreach ($dataJenisEnergiMemasak as $jenisEnergiMemasak)
                <option value="{{ $jenisEnergiMemasak->id }}" @selected(old('jenis_energi_memasak') == $jenisEnergiMemasak->id)>
                    {{ $jenisEnergiMemasak->jenis }}
                </option>
            @endforeach
        </select>
        @error('jenis_energi_memasak')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxJenisEnergiMemasakLainnya"
                    name="checkbox_jenis_energi_memasak_lainnya" value="true" @checked(old('checkbox_jenis_energi_memasak_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxJenisEnergiMemasakLainnya">Jenis Energi Lainnya</label>
            </div>
            <input type="text" id="inputJenisEnergiMemasakLainnya"
                class="form-control mt-1 @error('jenis_energi_memasak_lainnya') is-invalid @enderror"
                name="jenis_energi_memasak_lainnya" value="{{ old('jenis_energi_memasak_lainnya') }}"
                @if (old('checkbox_jenis_energi_memasak_lainnya') != 'true') disabled="true" @endif>
            @error('jenis_energi_memasak_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- sumber kayu --}}
    <div class="form-group">
        <label>Jika menggunakan kayu bakar untuk memasak, sumber kayu bakar</label>
        <select class="form-control @error('sumber_kayu') is-invalid @enderror" name="sumber_kayu" id="selectSumberKayu"
            @if (old('checkbox_sumber_kayu_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Sumber Kayu</option>
            @foreach ($dataSumberKayu as $sumberKayu)
                <option value="{{ $sumberKayu->id }}" @selected(old('sumber_kayu') == $sumberKayu->id)>{{ $sumberKayu->sumber }}
                </option>
            @endforeach
        </select>
        @error('sumber_kayu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxSumberKayuLainnya"
                    name="checkbox_sumber_kayu_lainnya" value="true" @checked(old('checkbox_sumber_kayu_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxSumberKayuLainnya">Sumber Kayu Lainnya</label>
            </div>
            <input type="text" id="inputSumberKayuLainnya"
                class="form-control mt-1 @error('sumber_kayu_lainnya') is-invalid @enderror" name="sumber_kayu_lainnya"
                value="{{ old('sumber_kayu_lainnya') }}" @if (old('checkbox_sumber_kayu_lainnya') != 'true') disabled="true" @endif>
            @error('sumber_kayu_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- tempat pembuangan sampah --}}
    <div class="form-group">
        <label>Tempat pembuangan sampah</label>
        <select class="form-control @error('tempat_pembuangan_sampah') is-invalid @enderror"
            name="tempat_pembuangan_sampah">
            <option value="" selected>Pilih Tempat Pembuangan</option>
            <option value="tidak ada" @selected(old('tempat_pembuangan_sampah') == 'tidak ada')>Tidak ada</option>
            <option value="di kebun/sungai/drainase" @selected(old('tempat_pembuangan_sampah') == 'di kebun/sungai/drainase')>Di kebun/sungai/drainase</option>
            <option value="dibakar" @selected(old('tempat_pembuangan_sampah') == 'dibakar')>Dibakar</option>
            <option value="tempat sampah" @selected(old('tempat_pembuangan_sampah') == 'tempat sampah')>Tempat sampah</option>
            <option value="tempat sampah diangkut reguler" @selected(old('tempat_pembuangan_sampah') == 'tempat sampah diangkut reguler')>Tempat sampah diangkut reguler
            </option>
        </select>
        @error('tempat_pembuangan_sampah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- fasilitas mck --}}
    <div class="form-group">
        <label>Fasilitas MCK</label>
        <select class="form-control @error('fasilitas_mck') is-invalid @enderror" name="fasilitas_mck">
            <option value="" selected>Pilih Fasilitas MCK</option>
            <option value="sendiri" @selected(old('fasilitas_mck') == 'sendiri')>Sendiri</option>
            <option value="berkelompok/tetangga" @selected(old('fasilitas_mck') == 'berkelompok/tetangga')>Berkelompok/tetangga</option>
            <option value="mck umum" @selected(old('fasilitas_mck') == 'mck umum')>MCK umum</option>
            <option value="tidak ada" @selected(old('fasilitas_mck') == 'tidak ada')>Tidak ada</option>
        </select>
        @error('fasilitas_mck')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- sumber air mandi --}}
    <div class="form-group">
        <label>Sumber air mandi terbanyak dari</label>
        <select class="form-control @error('sumber_air_mandi') is-invalid @enderror" name="sumber_air_mandi"
            id="selectSumberAirMandi" @if (old('checkbox_sumber_air_mandi_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Sumber Air Mandi</option>
            @foreach ($dataSumberAirMandi as $sumberAirMandi)
                <option value="{{ $sumberAirMandi->id }}" @selected(old('sumber_air_mandi') == $sumberAirMandi->id)>{{ $sumberAirMandi->sumber }}
                </option>
            @endforeach
        </select>
        @error('sumber_air_mandi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxSumberAirMandiLainnya"
                    name="checkbox_sumber_air_mandi_lainnya" value="true" @checked(old('checkbox_sumber_air_mandi_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxSumberAirMandiLainnya">Sumber Air Mandi Lainnya</label>
            </div>
            <input type="text" id="inputSumberAirMandiLainnya"
                class="form-control mt-1 @error('sumber_air_mandi_lainnya') is-invalid @enderror"
                name="sumber_air_mandi_lainnya" value="{{ old('sumber_air_mandi_lainnya') }}"
                @if (old('checkbox_sumber_air_mandi_lainnya') != 'true') disabled="true" @endif>
            @error('sumber_air_mandi_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- fasilitas bab --}}
    <div class="form-group">
        <label>Fasilitas buang air besar</label>
        <select class="form-control @error('fasilitas_bab') is-invalid @enderror" name="fasilitas_bab">
            <option value="" selected>Pilih Fasilitas BAB</option>
            <option value="jamban sendiri" @selected(old('fasilitas_bab') == 'jamban sendiri')>Jamban Sendiri</option>
            <option value="jamban bersama/tetangga" @selected(old('fasilitas_bab') == 'jamban bersama/tetangga')>Jamban Bersama/Tetangga</option>
            <option value="mck umum" @selected(old('fasilitas_bab') == 'mck umum')>MCK Umum</option>
            <option value="tidak ada" @selected(old('fasilitas_bab') == 'tidak ada')>Tidak Ada</option>
        </select>
        @error('fasilitas_bab')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- sumber air minum --}}
    <div class="form-group">
        <label>Sumber air minum terbanyak dari</label>
        <select class="form-control @error('sumber_air_minum') is-invalid @enderror" name="sumber_air_minum"
            id="selectSumberAirMinum" @if (old('checkbox_sumber_air_minum_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Sumber Air Minum</option>
            @foreach ($dataSumberAirMinum as $sumberAirMinum)
                <option value="{{ $sumberAirMinum->id }}" @selected(old('sumber_air_minum') == $sumberAirMinum->id)>{{ $sumberAirMinum->sumber }}
                </option>
            @endforeach
        </select>
        @error('sumber_air_minum')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxSumberAirMinumLainnya"
                    name="checkbox_sumber_air_minum_lainnya" value="true" @checked(old('checkbox_sumber_air_minum_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxSumberAirMinumLainnya">Sumber Air Minum Lainnya</label>
            </div>
            <input type="text" id="inputSumberAirMinumLainnya"
                class="form-control mt-1 @error('sumber_air_minum_lainnya') is-invalid @enderror"
                name="sumber_air_minum_lainnya" value="{{ old('sumber_air_minum_lainnya') }}"
                @if (old('checkbox_sumber_air_minum_lainnya') != 'true') disabled="true" @endif>
            @error('sumber_air_minum_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- pembuangan limbah --}}
    <div class="form-group">
        <label>Tempat pembuangan limbah cair</label>
        <select class="form-control @error('pembuangan_limbah') is-invalid @enderror" name="pembuangan_limbah"
            id="selectPembuanganLimbah" @if (old('checkbox_pembuangan_limbah_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Tempat Pembuangan</option>
            @foreach ($dataPembuanganLimbah as $pembuanganLimbah)
                <option value="{{ $pembuanganLimbah->id }}" @selected(old('pembuangan_limbah') == $pembuanganLimbah->id)>{{ $pembuanganLimbah->tempat }}
                </option>
            @endforeach
        </select>
        @error('pembuangan_limbah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxPembuanganLimbahLainnya"
                    name="checkbox_pembuangan_limbah_lainnya" value="true" @checked(old('checkbox_pembuangan_limbah_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxPembuanganLimbahLainnya">Tempat Pembuangan
                    Lainnya</label>
            </div>
            <input type="text" id="inputPembuanganLimbahLainnya"
                class="form-control mt-1 @error('pembuangan_limbah_lainnya') is-invalid @enderror"
                name="pembuangan_limbah_lainnya" value="{{ old('pembuangan_limbah_lainnya') }}"
                @if (old('checkbox_pembuangan_limbah_lainnya') != 'true') disabled="true" @endif>
            @error('pembuangan_limbah_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- rumah dibawah sutet --}}
    <div class="form-group">
        <label>Rumah berada dibawah SUTET/SUTT/SUTTAS</label>
        <select class="form-control @error('rumah_dibawah_sutet') is-invalid @enderror" name="rumah_dibawah_sutet">
            <option value="" selected>Pilih Status</option>
            <option value="ya" @selected(old('rumah_dibawah_sutet') == 'ya')>Ya</option>
            <option value="tidak" @selected(old('rumah_dibawah_sutet') == 'tidak')>Tidak</option>
        </select>
        @error('rumah_dibawah_sutet')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- rumah dibantaran sungai --}}
    <div class="form-group">
        <label>Rumah di bantaran sungai</label>
        <select class="form-control @error('rumah_dibantaran_sungai') is-invalid @enderror"
            name="rumah_dibantaran_sungai">
            <option value="" selected>Pilih Status</option>
            <option value="ya" @selected(old('rumah_dibantaran_sungai') == 'ya')>Ya</option>
            <option value="tidak" @selected(old('rumah_dibantaran_sungai') == 'tidak')>Tidak</option>
        </select>
        @error('rumah_dibantaran_sungai')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- rumah dilereng --}}
    <div class="form-group">
        <label>Rumah di lereng bukit/gunung</label>
        <select class="form-control @error('rumah_dilereng') is-invalid @enderror" name="rumah_dilereng">
            <option value="" selected>Pilih Status</option>
            <option value="ya" @selected(old('rumah_dilereng') == 'ya')>Ya</option>
            <option value="tidak" @selected(old('rumah_dilereng') == 'tidak')>Tidak</option>
        </select>
        @error('rumah_dilereng')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- kondisi rumah --}}
    <div class="form-group">
        <label>Kondisi Rumah</label>
        <select class="form-control @error('kondisi_rumah') is-invalid @enderror" name="kondisi_rumah">
            <option value="" selected>Pilih Kondisi Rumah</option>
            <option value="kumuh" @selected(old('kondisi_rumah') == 'kumuh')>Kumuh</option>
            <option value="tidak kumuh" @selected(old('kondisi_rumah') == 'tidak kumuh')>Tidak Kumuh</option>
        </select>
        @error('kondisi_rumah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection

@push('scripts')
    <script>
        const inputDusunLainnya = document.querySelector("#inputDusunLainnya")
        const selectDusun = document.querySelector("#selectDusun")
        document.querySelector("#checkboxDusunLainnya").addEventListener("click", function() {
            if (inputDusunLainnya.hasAttribute("disabled")) {
                inputDusunLainnya.removeAttribute("disabled")
                selectDusun.setAttribute("disabled", true)
            } else {
                inputDusunLainnya.setAttribute("disabled", true)
                selectDusun.removeAttribute("disabled")
            }
        })

        const inputRTLainnya = document.querySelector("#inputRTLainnya")
        const selectRT = document.querySelector("#selectRT")
        document.querySelector("#checkboxRTLainnya").addEventListener("click", function() {
            if (inputRTLainnya.hasAttribute("disabled")) {
                inputRTLainnya.removeAttribute("disabled")
                selectRT.setAttribute("disabled", true)
            } else {
                inputRTLainnya.setAttribute("disabled", true)
                selectRT.removeAttribute("disabled")
            }
        })

        const inputRWLainnya = document.querySelector("#inputRWLainnya")
        const selectRW = document.querySelector("#selectRW")
        document.querySelector("#checkboxRWLainnya").addEventListener("click", function() {
            if (inputRWLainnya.hasAttribute("disabled")) {
                inputRWLainnya.removeAttribute("disabled")
                selectRW.setAttribute("disabled", true)
            } else {
                inputRWLainnya.setAttribute("disabled", true)
                selectRW.removeAttribute("disabled")
            }
        })
    </script>
@endpush
