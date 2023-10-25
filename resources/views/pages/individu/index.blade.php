@extends('pages.layouts.index')

@section('table_column')
    <th>Nama</th>
    <th>NIK</th>
    <th>Jenis Kelamin</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Nomor HP</th>
@endsection

@section('table_data')
    @foreach ($datas as $index => $data)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->nik }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->tempat_lahir }}</td>
            <td>{{ $data->tanggal_lahir }}</td>
            <td>{{ $data->no_hp }}</td>
            <td class="text-nowrap">
                @switch($data->step)
                    @case('deskripsi')
                        <a href="/individu/create/{{ $data->id }}/pekerjaan" class="btn btn-icon btn-warning"><i
                                class="fa fa-play"></i></a>
                    @break

                    @case('pekerjaan')
                        <a href="/individu/create/{{ $data->id }}/kesehatan" class="btn btn-icon btn-warning"><i
                                class="fa fa-play"></i></a>
                    @break

                    @case('kesehatan')
                        <a href="/individu/create/{{ $data->id }}/pendidikan" class="btn btn-icon btn-warning"><i
                                class="fa fa-play"></i></a>
                    @break

                    @default
                        <a href="/individu/{{ $data->id }}/edit/deskripsi" class="btn btn-icon btn-primary"><i
                                class="far fa-edit"></i></a>
                        {{-- <a href="/individu/{{ $data->id }}" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a> --}}
                        <button class="btn btn-icon btn-danger modal-button">
                            <i class="fas fa-times"></i>
                        </button>

                        <div class="modal-body d-none">
                            <form action="/individu/{{ $data->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    Apakah anda yakin ingin menghapus data? {{ $data->id }}
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Ya</button>
                                    <button type="button" class="btn btn-secondary text-dark" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                @endswitch

            </td>
        </tr>
    @endforeach
@endsection
