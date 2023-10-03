@extends('pages.layouts.create')

@section('timeline')
    @include('pages.layouts.timeline', ['operation' => 'create'])
@endsection

@section('form_field')
    {{-- tingkat pendidikan --}}
    <div class="form-group">
        <label>Pendidikan tertinggi yang ditamatkan</label>
        {{ old('checkbox_tingkat_pendidikan_lainnya') ? 'anjay' : 'lol' }}
        <select class="form-control @error('tingkat_pendidikan') is-invalid @enderror" name="tingkat_pendidikan"
            id="selectTingkatPendidikan" @if (old('checkbox_tingkat_pendidikan_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Tingkat Pendidikan</option>
            @foreach ($dataTingkatPendidikan as $tingkatPendidikan)
                <option value="{{ $tingkatPendidikan->id }}" @selected(old('tingkat_pendidikan') == $tingkatPendidikan->id)>{{ $tingkatPendidikan->nama }}
                </option>
            @endforeach
        </select>
        @error('tingkat_pendidikan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxTingkatPendidikanLainnya"
                    name="checkbox_tingkat_pendidikan_lainnya" value="true" @checked(old('checkbox_tingkat_pendidikan_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxTingkatPendidikanLainnya">Tingkat Pendidikan
                    Lainnya</label>
            </div>
            <input type="text" id="inputTingkatPendidikanLainnya"
                class="form-control mt-1 @error('tingkat_pendidikan_lainnya') is-invalid @enderror"
                name="tingkat_pendidikan_lainnya" value="{{ old('tingkat_pendidikan_lainnya') }}"
                @if (old('checkbox_tingkat_pendidikan_lainnya') != 'true') disabled="true" @endif>
            @error('tingkat_pendidikan_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- pendidikan aktif --}}
    <div class="form-group">
        <label>Pendidikan yang sedang ditempuh</label>
        <select class="form-control @error('pendidikan_aktif') is-invalid @enderror" name="pendidikan_aktif">
            <option value="" selected>Pilih Pendidikan</option>
            @foreach ($dataPendidikanAktif as $pendidikanAktif)
                <option value="{{ $pendidikanAktif->id }}" @selected(old('pendidikan_aktif') == $pendidikanAktif->id)>{{ $pendidikanAktif->nama }}
                </option>
            @endforeach
        </select>
        @error('pendidikan_aktif')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- baca tulis --}}
    <div class="form-group">
        <label>Bisa Baca Tulis</label>
        <select class="form-control @error('status_baca_tulis') is-invalid @enderror" name="status_baca_tulis">
            <option value="" selected>Pilih Status Baca Tulis</option>
            <option value="ya" @selected(old('status_baca_tulis') == 'ya')>Ya</option>
            <option value="tidak" @selected(old('status_baca_tulis') == 'tidak')>Tidak</option>
        </select>
        @error('status_baca_tulis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- bahasa normal --}}
    <div class="form-group">
        <label>Bahasa digunakan dirumah dan permukiman (tuliskan)</label>
        <input type="text" class="form-control @error('bahasa_normal') is-invalid @enderror" name="bahasa_normal"
            value="{{ old('bahasa_normal') }}">
        @error('bahasa_normal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- bahasa formal --}}
    <div class="form-group">
        <label>Bahasa digunakan di lembaga formal (sekolah, tempat kerja, tuliskan)</label>
        <input type="text" class="form-control @error('bahasa_formal') is-invalid @enderror" name="bahasa_formal"
            value="{{ old('bahasa_formal') }}">
        @error('bahasa_formal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- total kerja bakti --}}
    <div class="form-group">
        <label>Kerja bakti setahun terakhir (jumlah)</label>
        <input type="text" class="form-control @error('total_kerja_bakti') is-invalid @enderror" name="total_kerja_bakti"
            value="{{ old('total_kerja_bakti') }}">
        @error('total_kerja_bakti')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- total siskamling --}}
    <div class="form-group">
        <label>Siskamling setahun terakhir (jumlah)</label>
        <input type="text" class="form-control @error('total_siskamling') is-invalid @enderror" name="total_siskamling"
            value="{{ old('total_siskamling') }}">
        @error('total_siskamling')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- total pesta rakyat --}}
    <div class="form-group">
        <label>Pesta rakyat/adat setahun terakhir (jumlah)</label>
        <input type="text" class="form-control @error('total_pesta_rakyat') is-invalid @enderror"
            name="total_pesta_rakyat" value="{{ old('total_pesta_rakyat') }}">
        @error('total_pesta_rakyat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- total menolong kematian --}}
    <div class="form-group">
        <label>Menolong warga yang mengalami kematian keluarga setahun terakhir (jumlah)</label>
        <input type="text" class="form-control @error('total_menolong_kematian') is-invalid @enderror"
            name="total_menolong_kematian" value="{{ old('total_menolong_kematian') }}">
        @error('total_menolong_kematian')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- total menolong sakit --}}
    <div class="form-group">
        <label>Menolong warga yang sedang sakit setahun terakhir (jumlah)</label>
        <input type="text" class="form-control @error('total_menolong_sakit') is-invalid @enderror"
            name="total_menolong_sakit" value="{{ old('total_menolong_sakit') }}">
        @error('total_menolong_sakit')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- total menolong kecelakaan --}}
    <div class="form-group">
        <label>Menolong warga yang kecelakaan setahun terakhir (jumlah)</label>
        <input type="text" class="form-control @error('total_menolong_kecelakaan') is-invalid @enderror"
            name="total_menolong_kecelakaan" value="{{ old('total_menolong_kecelakaan') }}">
        @error('total_menolong_kecelakaan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection

@push('scripts')
    <script>
        const inputTingkatPendidikanLainnya = document.querySelector("#inputTingkatPendidikanLainnya")
        const selectTingkatPendidikan = document.querySelector("#selectTingkatPendidikan")
        document.querySelector("#checkboxTingkatPendidikanLainnya").addEventListener("click", function() {
            if (inputTingkatPendidikanLainnya.hasAttribute("disabled")) {
                inputTingkatPendidikanLainnya.removeAttribute("disabled")
                selectTingkatPendidikan.setAttribute("disabled", true)
            } else {
                inputTingkatPendidikanLainnya.setAttribute("disabled", true)
                selectTingkatPendidikan.removeAttribute("disabled")
            }
        })
    </script>
@endpush
