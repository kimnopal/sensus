@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ubah {{ $title }}</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah {{ $title }}</h4>
                    </div>
                    <form action="{{ $path }}/{{ $data->id }}" method="POST"
                        class="card-body d-flex flex-column">
                        @csrf
                        @method('PUT')
                        @yield('form_field')
                        <button class="btn btn-primary align-self-end">Ubah Data</button>
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
