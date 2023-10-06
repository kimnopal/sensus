@extends('pages.master.layouts.create')

@section('form_field')
    <div class="form-group">
        <label>Jenis</label>
        <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis"
            value="{{ old('jenis') }}">
        @error('jenis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
