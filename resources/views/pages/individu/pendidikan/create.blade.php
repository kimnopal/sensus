@extends('pages.layouts.create')

@section('timeline')
    @include('pages.layouts.timeline')
@endsection

@section('form_field')
    {{-- nama --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
            value="{{ old('nama') }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Pekerjaan Utama --}}
    <div class="form-group">
        <label>Pekerjaan Utama</label>
        <select class="form-control @error('pekerjaan_utama') is-invalid @enderror" name="pekerjaan_utama"
            id="selectPekerjaanUtama" @if (old('checkbox_pekerjaan_utama_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Pekerjaan Utama</option>
            @foreach ($dataPekerjaanUtama as $pekerjaanUtama)
                <option value="{{ $pekerjaanUtama->id }}" @selected(old('pekerjaan_utama') == $pekerjaanUtama->id)>{{ $pekerjaanUtama->nama }}
                </option>
            @endforeach
        </select>
        @error('pekerjaan_utama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxPekerjaanUtamaLainnya"
                    name="checkbox_pekerjaan_utama_lainnya" value="true" @checked(old('checkbox_pekerjaan_utama_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxPekerjaanUtamaLainnya">Pekerjaan Utama Lainnya</label>
            </div>
            <input type="text" id="inputPekerjaanUtamaLainnya"
                class="form-control mt-1 @error('pekerjaan_utama_lainnya') is-invalid @enderror"
                name="pekerjaan_utama_lainnya" value="{{ old('pekerjaan_utama_lainnya') }}"
                @if (old('checkbox_pekerjaan_utama_lainnya') != 'true') disabled="true" @endif>
            @error('pekerjaan_utama_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
@endsection
