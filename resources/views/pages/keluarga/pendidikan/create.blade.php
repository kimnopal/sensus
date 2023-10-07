@extends('pages.layouts.create')

@section('timeline')
    @include('pages.keluarga.timeline', ['operation' => 'create'])
@endsection

@section('form_field')
    {{-- anak bersekolah --}}
    <div class="form-group">
        <label>Keluarga dengan anak Usia 7-18 tahun bersekolah</label>
        <select class="form-control @error('anak_bersekolah') is-invalid @enderror" name="anak_bersekolah">
            <option value="" selected>Pilih Status</option>
            <option value="ada" @selected(old('anak_bersekolah') == 'ada')>Ada</option>
            <option value="tidak" @selected(old('anak_bersekolah') == 'tidak')>Tidak</option>
        </select>
        @error('anak_bersekolah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- anak putus bersekolah --}}
    <div class="form-group">
        <label>Keluarga dengan Anak Usia 7-18 tahun Putus Sekolah</label>
        <select class="form-control @error('anak_putus_sekolah') is-invalid @enderror" name="anak_putus_sekolah">
            <option value="" selected>Pilih Status</option>
            <option value="ada" @selected(old('anak_putus_sekolah') == 'ada')>Ada</option>
            <option value="tidak" @selected(old('anak_putus_sekolah') == 'tidak')>Tidak</option>
        </select>
        @error('anak_putus_sekolah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- buta huruf --}}
    <div class="form-group">
        <label>Ada anggota keluarga tidak bisa baca tulis</label>
        <select class="form-control @error('buta_huruf') is-invalid @enderror" name="buta_huruf">
            <option value="" selected>Pilih Status</option>
            <option value="ada" @selected(old('buta_huruf') == 'ada')>Ada</option>
            <option value="tidak" @selected(old('buta_huruf') == 'tidak')>Tidak</option>
        </select>
        @error('buta_huruf')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- akses pendidikan --}}
    <div class="form-group">
        <label class="mb-2">Akses Pendidikan terdekat</label>
        <div id="accordion">
            @foreach ($dataJenisPendidikan as $jenisPendidikan)
                <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse"
                        data-target="#panel-body-{{ $jenisPendidikan->id }}" aria-expanded="false"
                        data-sumber-penghasilan=1>
                        <h4 class="accordion-title">{{ $jenisPendidikan->jenis }}</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-{{ $jenisPendidikan->id }}"
                        data-parent="#accordion">

                        {{-- jarak tempuh --}}
                        <div class="form-group">
                            <label>Jarak</label>
                            <div
                                class="input-group @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') is-invalid @enderror">
                                <input type="text"
                                    class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') is-invalid @enderror"
                                    name="akses_pendidikan[{{ $jenisPendidikan->id }}][jarak_tempuh]"
                                    value="{{ old('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">km</span>
                                </div>
                            </div>

                            @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- waktu tempuh --}}
                        <div class="form-group">
                            <label>waktu</label>
                            <div
                                class="input-group @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') is-invalid @enderror">
                                <input type="text"
                                    class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') is-invalid @enderror"
                                    name="akses_pendidikan[{{ $jenisPendidikan->id }}][waktu_tempuh]"
                                    value="{{ old('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">jam</span>
                                </div>
                            </div>

                            @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- status --}}
                        <div class="form-group">
                            <label>Status</label>
                            <select
                                class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.status') is-invalid @enderror"
                                name="akses_pendidikan[{{ $jenisPendidikan->id }}][status]">
                                <option value="" selected>Pilih Status</option>

                                <option value="mudah" @selected(old('akses_pendidikan.' . $jenisPendidikan->id . '.status') == 'mudah')>Mudah</option>

                                <option value="sulit" @selected(old('akses_pendidikan.' . $jenisPendidikan->id . '.status') == 'sulit')>Sulit</option>
                            </select>
                            @error('akses_pendidikan.' . $jenisPendidikan->id . '.status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const inputStatusRumahLainnya = document.querySelector("#inputStatusRumahLainnya")
        const selectStatusRumah = document.querySelector("#selectStatusRumah")
        document.querySelector("#checkboxStatusRumahLainnya").addEventListener("click", function() {
            if (inputStatusRumahLainnya.hasAttribute("disabled")) {
                inputStatusRumahLainnya.removeAttribute("disabled")
                selectStatusRumah.setAttribute("disabled", true)
            } else {
                inputStatusRumahLainnya.setAttribute("disabled", true)
                selectStatusRumah.removeAttribute("disabled")
            }
        })

        const inputStatusLahanLainnya = document.querySelector("#inputStatusLahanLainnya")
        const selectStatusLahan = document.querySelector("#selectStatusLahan")
        document.querySelector("#checkboxStatusLahanLainnya").addEventListener("click", function() {
            if (inputStatusLahanLainnya.hasAttribute("disabled")) {
                inputStatusLahanLainnya.removeAttribute("disabled")
                selectStatusLahan.setAttribute("disabled", true)
            } else {
                inputStatusLahanLainnya.setAttribute("disabled", true)
                selectStatusLahan.removeAttribute("disabled")
            }
        })

        const inputJenisLantaiLainnya = document.querySelector("#inputJenisLantaiLainnya")
        const selectJenisLantai = document.querySelector("#selectJenisLantai")
        document.querySelector("#checkboxJenisLantaiLainnya").addEventListener("click", function() {
            if (inputJenisLantaiLainnya.hasAttribute("disabled")) {
                inputJenisLantaiLainnya.removeAttribute("disabled")
                selectJenisLantai.setAttribute("disabled", true)
            } else {
                inputJenisLantaiLainnya.setAttribute("disabled", true)
                selectJenisLantai.removeAttribute("disabled")
            }
        })

        const inputJenisDindingLainnya = document.querySelector("#inputJenisDindingLainnya")
        const selectJenisDinding = document.querySelector("#selectJenisDinding")
        document.querySelector("#checkboxJenisDindingLainnya").addEventListener("click", function() {
            if (inputJenisDindingLainnya.hasAttribute("disabled")) {
                inputJenisDindingLainnya.removeAttribute("disabled")
                selectJenisDinding.setAttribute("disabled", true)
            } else {
                inputJenisDindingLainnya.setAttribute("disabled", true)
                selectJenisDinding.removeAttribute("disabled")
            }
        })

        const inputJenisAtapLainnya = document.querySelector("#inputJenisAtapLainnya")
        const selectJenisAtap = document.querySelector("#selectJenisAtap")
        document.querySelector("#checkboxJenisAtapLainnya").addEventListener("click", function() {
            if (inputJenisAtapLainnya.hasAttribute("disabled")) {
                inputJenisAtapLainnya.removeAttribute("disabled")
                selectJenisAtap.setAttribute("disabled", true)
            } else {
                inputJenisAtapLainnya.setAttribute("disabled", true)
                selectJenisAtap.removeAttribute("disabled")
            }
        })

        const inputJenisPeneranganLainnya = document.querySelector("#inputJenisPeneranganLainnya")
        const selectJenisPenerangan = document.querySelector("#selectJenisPenerangan")
        document.querySelector("#checkboxJenisPeneranganLainnya").addEventListener("click", function() {
            if (inputJenisPeneranganLainnya.hasAttribute("disabled")) {
                inputJenisPeneranganLainnya.removeAttribute("disabled")
                selectJenisPenerangan.setAttribute("disabled", true)
            } else {
                inputJenisPeneranganLainnya.setAttribute("disabled", true)
                selectJenisPenerangan.removeAttribute("disabled")
            }
        })

        const inputJenisEnergiMemasakLainnya = document.querySelector("#inputJenisEnergiMemasakLainnya")
        const selectJenisEnergiMemasak = document.querySelector("#selectJenisEnergiMemasak")
        document.querySelector("#checkboxJenisEnergiMemasakLainnya").addEventListener("click", function() {
            if (inputJenisEnergiMemasakLainnya.hasAttribute("disabled")) {
                inputJenisEnergiMemasakLainnya.removeAttribute("disabled")
                selectJenisEnergiMemasak.setAttribute("disabled", true)
            } else {
                inputJenisEnergiMemasakLainnya.setAttribute("disabled", true)
                selectJenisEnergiMemasak.removeAttribute("disabled")
            }
        })

        const inputSumberKayuLainnya = document.querySelector("#inputSumberKayuLainnya")
        const selectSumberKayu = document.querySelector("#selectSumberKayu")
        document.querySelector("#checkboxSumberKayuLainnya").addEventListener("click", function() {
            if (inputSumberKayuLainnya.hasAttribute("disabled")) {
                inputSumberKayuLainnya.removeAttribute("disabled")
                selectSumberKayu.setAttribute("disabled", true)
            } else {
                inputSumberKayuLainnya.setAttribute("disabled", true)
                selectSumberKayu.removeAttribute("disabled")
            }
        })

        const inputSumberAirMandiLainnya = document.querySelector("#inputSumberAirMandiLainnya")
        const selectSumberAirMandi = document.querySelector("#selectSumberAirMandi")
        document.querySelector("#checkboxSumberAirMandiLainnya").addEventListener("click", function() {
            if (inputSumberAirMandiLainnya.hasAttribute("disabled")) {
                inputSumberAirMandiLainnya.removeAttribute("disabled")
                selectSumberAirMandi.setAttribute("disabled", true)
            } else {
                inputSumberAirMandiLainnya.setAttribute("disabled", true)
                selectSumberAirMandi.removeAttribute("disabled")
            }
        })

        const inputSumberAirMinumLainnya = document.querySelector("#inputSumberAirMinumLainnya")
        const selectSumberAirMinum = document.querySelector("#selectSumberAirMinum")
        document.querySelector("#checkboxSumberAirMinumLainnya").addEventListener("click", function() {
            if (inputSumberAirMinumLainnya.hasAttribute("disabled")) {
                inputSumberAirMinumLainnya.removeAttribute("disabled")
                selectSumberAirMinum.setAttribute("disabled", true)
            } else {
                inputSumberAirMinumLainnya.setAttribute("disabled", true)
                selectSumberAirMinum.removeAttribute("disabled")
            }
        })

        const inputPembuanganLimbahLainnya = document.querySelector("#inputPembuanganLimbahLainnya")
        const selectPembuanganLimbah = document.querySelector("#selectPembuanganLimbah")
        document.querySelector("#checkboxPembuanganLimbahLainnya").addEventListener("click", function() {
            if (inputPembuanganLimbahLainnya.hasAttribute("disabled")) {
                inputPembuanganLimbahLainnya.removeAttribute("disabled")
                selectPembuanganLimbah.setAttribute("disabled", true)
            } else {
                inputPembuanganLimbahLainnya.setAttribute("disabled", true)
                selectPembuanganLimbah.removeAttribute("disabled")
            }
        })
    </script>
@endpush
