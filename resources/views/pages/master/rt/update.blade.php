@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ubah RT</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah RT</h4>
                    </div>
                    <form action="/rt/{{ $rt->id }}" method="POST" class="card-body d-flex flex-column">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nomor RT</label>
                            <input type="text" class="form-control @error('nomor') is-invalid @enderror" name="nomor"
                                value="{{ old('nama') ?? $rt->nomor }}">
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button href="/rt/create" class="btn btn-primary align-self-end">Ubah Data</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    @error('nomor')
        <script>
            iziToast.error({
                title: '',
                message: 'Gagal memperbarui data RT',
                position: 'topRight'
            });
        </script>
    @enderror
@endpush
