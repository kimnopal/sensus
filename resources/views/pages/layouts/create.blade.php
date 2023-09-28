@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
    <style>
        .timeline-steps {
            display: flex;
            justify-content: center;
            flex-wrap: wrap
        }

        .timeline-steps .timeline-step {
            align-items: center;
            display: flex;
            flex-direction: column;
            position: relative;
            margin: 1rem;
            text-decoration: inherit;
            color: inherit;
        }

        .timeline-steps .timeline-step .timeline-content.active {
            color: #3b82f6;
        }

        @media (min-width:768px) {
            .timeline-steps .timeline-step:not(:last-child):after {
                content: "";
                display: block;
                border-top: .25rem dotted #39393a;
                width: 3.46rem;
                position: absolute;
                left: 7.5rem;
                top: .3125rem
            }

            .timeline-steps .timeline-step.active-right:not(:last-child):after {
                border-top: .25rem dotted #3b82f6;
            }

            .timeline-steps .timeline-step:not(:first-child):before {
                content: "";
                display: block;
                border-top: .25rem dotted #39393a;
                width: 3.8125rem;
                position: absolute;
                right: 7.5rem;
                top: .3125rem
            }

            .timeline-steps .timeline-step.active-left:not(:first-child):before {
                border-top: .25rem dotted #3b82f6;
            }
        }

        .timeline-steps .timeline-content {
            width: 10rem;
            text-align: center
        }

        .timeline-steps .timeline-content.active .inner-circle {
            background-color: #3b82f6
        }

        .timeline-steps .timeline-content .inner-circle {
            border-radius: 1.5rem;
            height: 1rem;
            width: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #3d3d3d
        }

        .timeline-steps .timeline-content.active .inner-circle:before {
            background-color: #3b82f6;
        }

        .timeline-steps .timeline-content .inner-circle:before {
            content: "";
            background-color: inherit;
            display: inline-block;
            height: 3rem;
            width: 3rem;
            min-width: 3rem;
            border-radius: 6.25rem;
            opacity: .5
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah {{ $title }}</h1>
            </div>

            @yield('timeline')

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah {{ $title }}</h4>
                    </div>
                    <form action="/individu{{ $path }}" method="POST" class="card-body d-flex flex-column">
                        @csrf
                        @yield('form_field')
                        <button type="submit" class="btn btn-primary align-self-end">Selanjutnya</button>
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

    @stack('scripts')
@endpush
