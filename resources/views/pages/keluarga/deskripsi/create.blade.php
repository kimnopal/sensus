@extends('pages.layouts.create')

@section('timeline')
    @include('pages.keluarga.timeline', ['operation' => 'create'])
@endsection

@section('form_field')
    {{-- dusun --}}
    <div class="form-group">
        <label>Dusun</label>
        <select class="form-control @error('dusun') is-invalid @enderror" name="dusun" id="selectDusun"
            @if (old('checkbox_dusun_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Dusun</option>
            @foreach ($dataDusun as $dusun)
                <option value="{{ $dusun->id }}" @selected(old('dusun') == $dusun->id)>{{ $dusun->nama }}
                </option>
            @endforeach
        </select>
        @error('dusun')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxDusunLainnya" name="checkbox_dusun_lainnya"
                    value="true" @checked(old('checkbox_dusun_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxDusunLainnya">Dusun Lainnya</label>
            </div>
            <input type="text" id="inputDusunLainnya"
                class="form-control mt-1 @error('dusun_lainnya') is-invalid @enderror" name="dusun_lainnya"
                value="{{ old('dusun_lainnya') }}" @if (old('checkbox_dusun_lainnya') != 'true') disabled="true" @endif>
            @error('dusun_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- rt --}}
    <div class="form-group">
        <label>RT</label>
        <select class="form-control @error('rt') is-invalid @enderror" name="rt" id="selectRT"
            @if (old('checkbox_rt_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih RT</option>
            @foreach ($dataRT as $rt)
                <option value="{{ $rt->id }}" @selected(old('rt') == $rt->id)>{{ $rt->nomor }}
                </option>
            @endforeach
        </select>
        @error('rt')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxRTLainnya" name="checkbox_rt_lainnya"
                    value="true" @checked(old('checkbox_rt_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxRTLainnya">RT Lainnya</label>
            </div>
            <input type="text" id="inputRTLainnya" class="form-control mt-1 @error('rt_lainnya') is-invalid @enderror"
                name="rt_lainnya" value="{{ old('rt_lainnya') }}" @if (old('checkbox_rt_lainnya') != 'true') disabled="true" @endif>
            @error('rt_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- rw --}}
    <div class="form-group">
        <label>RW</label>
        <select class="form-control @error('rw') is-invalid @enderror" name="rw" id="selectRW"
            @if (old('checkbox_rw_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih RW</option>
            @foreach ($dataRW as $rw)
                <option value="{{ $rw->id }}" @selected(old('rw') == $rw->id)>{{ $rw->nomor }}
                </option>
            @endforeach
        </select>
        @error('rw')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxRWLainnya" name="checkbox_rw_lainnya"
                    value="true" @checked(old('checkbox_rw_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxRWLainnya">RW Lainnya</label>
            </div>
            <input type="text" id="inputRWLainnya" class="form-control mt-1 @error('rw_lainnya') is-invalid @enderror"
                name="rw_lainnya" value="{{ old('rw_lainnya') }}"
                @if (old('checkbox_rw_lainnya') != 'true') disabled="true" @endif>
            @error('rw_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- nomor kk --}}
    <div class="form-group">
        <label>Nomor KK</label>
        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"
            value="{{ old('no_kk') }}">
        @error('no_kk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection

@push('scripts')
    <script>
        const inputDusunLainnya = document.querySelector("#inputDusunLainnya")
        const selectDusun = document.querySelector("#selectDusun")
        document.querySelector("#checkboxDusunLainnya").addEventListener("click", function() {
            if (inputDusunLainnya.hasAttribute("disabled")) {
                inputDusunLainnya.removeAttribute("disabled")
                selectDusun.setAttribute("disabled", true)
            } else {
                inputDusunLainnya.setAttribute("disabled", true)
                selectDusun.removeAttribute("disabled")
            }
        })

        const inputRTLainnya = document.querySelector("#inputRTLainnya")
        const selectRT = document.querySelector("#selectRT")
        document.querySelector("#checkboxRTLainnya").addEventListener("click", function() {
            if (inputRTLainnya.hasAttribute("disabled")) {
                inputRTLainnya.removeAttribute("disabled")
                selectRT.setAttribute("disabled", true)
            } else {
                inputRTLainnya.setAttribute("disabled", true)
                selectRT.removeAttribute("disabled")
            }
        })

        const inputRWLainnya = document.querySelector("#inputRWLainnya")
        const selectRW = document.querySelector("#selectRW")
        document.querySelector("#checkboxRWLainnya").addEventListener("click", function() {
            if (inputRWLainnya.hasAttribute("disabled")) {
                inputRWLainnya.removeAttribute("disabled")
                selectRW.setAttribute("disabled", true)
            } else {
                inputRWLainnya.setAttribute("disabled", true)
                selectRW.removeAttribute("disabled")
            }
        })
    </script>
@endpush
