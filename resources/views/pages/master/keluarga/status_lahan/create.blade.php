@extends('pages.master.layouts.create')

@section('form_field')
    <div class="form-group">
        <label>Status</label>
        <input type="text" class="form-control @error('status') is-invalid @enderror" name="status"
            value="{{ old('status') }}">
        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
