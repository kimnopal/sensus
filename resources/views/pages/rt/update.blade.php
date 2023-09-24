@extends('pages.layouts.update')

@section('form_field')
    <div class="form-group">
        <label>Nomor RT</label>
        <input type="text" class="form-control @error('nomor') is-invalid @enderror" name="nomor"
            value="{{ old('nama') ?? $data->nomor }}">
        @error('nomor')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
