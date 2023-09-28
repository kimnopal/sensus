@extends('pages.layouts.create')

@section('timeline')
    @include('pages.layouts.timeline')
@endsection

@section('form_field')
    {{-- nama --}}
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
@endsection
