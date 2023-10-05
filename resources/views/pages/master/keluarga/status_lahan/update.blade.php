@extends('pages.master.layouts.update')

@section('form_field')
    <div class="form-group">
        <label>Status</label>
        <input type="text" class="form-control @error('status') is-invalid @enderror" name="status"
            value="{{ old('status') ?? $data->status }}">
        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
