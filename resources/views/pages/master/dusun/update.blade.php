@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Dusun</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Dusun</h4>
                    </div>
                    <form action="/dusun/{{ $dusun->id }}" method="POST" class="card-body d-flex flex-column">
                        @csrf
                        @method('PUT')
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

                        <button href="/dusun/create" class="btn btn-primary align-self-end">Tambah Data</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
