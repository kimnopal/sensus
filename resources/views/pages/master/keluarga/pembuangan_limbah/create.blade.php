@extends('pages.master.layouts.create')

@section('form_field')
    <div class="form-group">
        <label>Tempat</label>
        <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat"
            value="{{ old('tempat') }}">
        @error('tempat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
