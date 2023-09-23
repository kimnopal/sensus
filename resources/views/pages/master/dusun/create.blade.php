@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
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
                    <form action="/dusun" method="POST" class="card-body d-flex flex-column">
                        @csrf
                        <div class="form-group">
                            <label>Nama Dusun</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ old('nama') }}">
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
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    @error('nama')
        <script>
            iziToast.error({
                title: '',
                message: 'Gagal menambahkan data Dusun',
                position: 'topRight'
            });
        </script>
    @enderror
@endpush
