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
                <h1>Data Dusun</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <a href="/dusun/create" class="btn btn-primary mr-auto">Tambah Data Dusun</a>

                        <div class="card">
                            <div class="card-header">
                                <h4>Data Dusun</h4>
                                <div class="card-header-form">
                                    <form action="/dusun" method="GET">
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
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($dataDusun as $index => $dusun)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $dusun->nama }}</td>
                                                <td>
                                                    <a href="/dusun/{{ $dusun->id }}/edit"
                                                        class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                    <button class="btn btn-icon btn-danger modal-button">
                                                        <i class="fas fa-times"></i>
                                                    </button>

                                                    <div class="modal-body d-none">
                                                        <form action="/dusun/{{ $dusun->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="form-group">
                                                                Apakah anda yakin ingin menghapus data?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                                <button type="button" class="btn btn-secondary text-dark"
                                                                    data-dismiss="modal">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                {{ $dataDusun->links() }}
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
                message: 'Berhasil menambahkan data Dusun',
                position: 'topRight'
            });
        </script>
    @endif

    @if (session()->has('success-update'))
        <script>
            iziToast.success({
                title: '',
                message: 'Berhasil memperbarui data Dusun',
                position: 'topRight'
            });
        </script>
    @endif

    @if (session()->has('success-delete'))
        <script>
            iziToast.success({
                title: '',
                message: 'Berhasil menghapus data Dusun',
                position: 'topRight'
            });
        </script>
    @endif
@endpush
