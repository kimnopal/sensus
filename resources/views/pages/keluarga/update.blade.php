@extends('pages.layouts.update')

@section('form_field')
    <div class="form-group">
        <label>Nomor Kartu Keluarga</label>
        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"
            value="{{ old('no_kk', $data->no_kk) }}">
        @error('no_kk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Dusun</label>
        <select class="form-control @error('dusun_id') is-invalid @enderror" name="dusun_id">
            <option value="">Pilih Dusun</option>
            @foreach ($dataDusun as $dusun)
                <option value="{{ $dusun->id }}" @selected($dusun->id == old('dusun_id', $data->dusun_id))>{{ $dusun->nama }}</option>
            @endforeach
        </select>
        @error('dusun_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>RT</label>
        <select class="form-control @error('rt_id') is-invalid @enderror" name="rt_id">
            <option value="">Pilih RT</option>
            @foreach ($dataRT as $rt)
                <option value="{{ $rt->id }}" @selected($rt->id == old('rt_id', $data->rt_id))>{{ $rt->nomor }}</option>
            @endforeach
        </select>
        @error('rt_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>RW</label>
        <select class="form-control @error('rw_id') is-invalid @enderror" name="rw_id">
            <option value="">Pilih RW</option>
            @foreach ($dataRW as $rw)
                <option value="{{ $rw->id }}" @selected($rw->id == old('rw_id', $data->rw_id))>{{ $rw->nomor }}</option>
            @endforeach
        </select>
        @error('rw_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection
