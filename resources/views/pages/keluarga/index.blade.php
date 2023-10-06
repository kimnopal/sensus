@extends('pages.layouts.index')

@section('table_column')
    <th>Nomor KK</th>
    <th>Dusun</th>
    <th>RT</th>
    <th>RW</th>
@endsection

@section('table_data')
    @foreach ($datas as $index => $data)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $data->no_kk }}</td>
            <td>{{ $data->dusun->nama ?? '-' }}</td>
            <td>{{ $data->rt->nomor ?? '-' }}</td>
            <td>{{ $data->rw->nomor ?? '-' }}</td>
            <td>
                @switch($data->step)
                    @case('deskripsi')
                        <a href="/keluarga/create/{{ $data->id }}/permukiman" class="btn btn-icon btn-warning"><i
                                class="fa fa-play"></i></a>
                    @break

                    @case('permukiman')
                        <a href="/keluarga/create/{{ $data->id }}/pendidikan" class="btn btn-icon btn-warning"><i
                                class="fa fa-play"></i></a>
                    @break

                    @case('pendidikan')
                        <a href="/keluarga/create/{{ $data->id }}/kesehatan" class="btn btn-icon btn-warning"><i
                                class="fa fa-play"></i></a>
                    @break

                    @case('kesehatan')
                        <a href="/keluarga/create/{{ $data->id }}/enumerator" class="btn btn-icon btn-warning"><i
                                class="fa fa-play"></i></a>
                    @break

                    @default
                        <a href="/keluarga/{{ $data->id }}/edit/deskripsi" class="btn btn-icon btn-primary"><i
                                class="far fa-edit"></i></a>
                        {{-- <a href="/individu/{{ $data->id }}" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a> --}}
                        <button class="btn btn-icon btn-danger modal-button">
                            <i class="fas fa-times"></i>
                        </button>
                @endswitch

                <div class="modal-body d-none">
                    <form action="/keluarga/{{ $data->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            Apakah anda yakin ingin menghapus data?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Ya</button>
                            <button type="button" class="btn btn-secondary text-dark" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
@endsection
