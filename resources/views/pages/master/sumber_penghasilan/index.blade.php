@extends('pages.master.layouts.index')

@section('table_column')
    <th>Nama</th>
    <th>Satuan</th>
@endsection

@section('table_data')
    @foreach ($datas as $index => $data)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->satuan->nama }}</td>
            <td>
                <a href="/sumber_penghasilan/{{ $data->id }}/edit" class="btn btn-icon btn-primary"><i
                        class="far fa-edit"></i></a>
                <button class="btn btn-icon btn-danger modal-button">
                    <i class="fas fa-times"></i>
                </button>

                <div class="modal-body d-none">
                    <form action="/sumber_penghasilan/{{ $data->id }}" method="POST">
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