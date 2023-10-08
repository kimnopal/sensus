@extends('pages.layouts.update')

@section('timeline')
    @include('pages.keluarga.timeline', ['operation' => 'edit'])
@endsection

@section('form_field')
    {{-- nama --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
            value="{{ old('nama', $data->nama) }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- alamat --}}
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
            value="{{ old('alamat', $data->alamat) }}">
        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- no hp --}}
    <div class="form-group">
        <label>HP/Telepon</label>
        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
            value="{{ old('no_hp', $data->no_hp) }}">
        @error('no_hp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
