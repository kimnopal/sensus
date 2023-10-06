@extends('pages.master.layouts.update')

@section('form_field')
    <div class="form-group">
        <label>Sumber</label>
        <input type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber"
            value="{{ old('sumber') ?? $data->sumber }}">
        @error('sumber')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
