@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah {{ $title }}</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah {{ $title }}</h4>
                    </div>
                    <form action="{{ $path }}" method="POST" class="card-body d-flex flex-column">
                        @csrf
                        @yield('form_field')
                        <button href="{{ $path }}/create"
                            class="btn btn-primary align-self-end">Selanjutnya</button>
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
                message: 'Gagal menambahkan data',
                position: 'topRight'
            });
        </script>
    @enderror
@endpush
