@extends('pages.master.layouts.update')

@section('form_field')
    <div class="form-group">
        <label>Agama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
            value="{{ old('nama') ?? $data->nama }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
