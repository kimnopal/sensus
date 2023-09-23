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
                <h1>Data {{ $title }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ $path }}/create" class="btn btn-primary mr-auto">Tambah Data
                            {{ $title }}</a>

                        <div class="card">
                            <div class="card-header">
                                <h4>Data {{ $title }}</h4>
                                <div class="card-header-form">
                                    <form action="{{ $path }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table-md table">
                                        <tr>
                                            <th>#</th>
                                            @yield('table_column')
                                            <th>Action</th>
                                        </tr>
                                        @yield('table_data')
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                {{ $datas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        const modalButtons = $('.modal-button')
        const modalBody = $('.modal-body')

        modalButtons.each(function(indexButton) {
            let modalButton = $(this)
            modalBody.each(function(indexBody) {
                if (indexBody == indexButton) {
                    modalButton.fireModal({
                        title: 'Konfirmasi',
                        body: $(this).removeClass("d-none")
                    })
                }
            })

        })
    </script>

    @if (session()->has('success-create'))
        <script>
            iziToast.success({
                title: '',
                message: 'Berhasil menambahkan data',
                position: 'topRight'
            });
        </script>
    @endif

    @if (session()->has('success-update'))
        <script>
            iziToast.success({
                title: '',
                message: 'Berhasil memperbarui data',
                position: 'topRight'
            });
        </script>
    @endif

    @if (session()->has('success-delete'))
        <script>
            iziToast.success({
                title: '',
                message: 'Berhasil menghapus data',
                position: 'topRight'
            });
        </script>
    @endif
@endpush
