@extends('pages.master.layouts.update')

@section('form_field')
    <div class="form-group">
        <label>Nama Dusun</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
            value="{{ old('nama') ?? $dusun->nama }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
