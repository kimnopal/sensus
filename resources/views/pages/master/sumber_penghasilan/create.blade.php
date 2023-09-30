@extends('pages.master.layouts.create')

@section('form_field')
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

    <div class="form-group">
        <label>Satuan</label>
        <select class="form-control @error('satuan') is-invalid @enderror" name="satuan">
            <option value="" selected>Pilih Satuan</option>
            @foreach ($dataSatuan as $satuan)
                <option value="{{ $satuan->id }}" @selected(old('satuan') == $satuan->id)>{{ $satuan->nama }}
                </option>
            @endforeach
        </select>
        @error('satuan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
