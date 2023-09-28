@extends('pages.layouts.create')

@section('timeline')
    @include('pages.layouts.timeline')
@endsection

@section('form_field')
    {{-- {{ dd($errors->all()) }} --}}
    {{-- nama --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
            value="{{ old('nama') }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- nik --}}
    <div class="form-group">
        <label>NIK</label>
        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
            value="{{ old('nik') }}">
        @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
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

    {{-- jenis kelamin --}}
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
            <option value="" selected>Pilih Jenis Kelamin</option>
            <option value="laki-laki" @selected(old('jenis_kelamin') == 'laki-laki')>laki - Laki</option>
            <option value="perempuan" @selected(old('jenis_kelamin') == 'perempuan')>Perempuan</option>
        </select>
        @error('jenis_kelamin')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- tempat lahir --}}
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
            value="{{ old('tempat_lahir') }}">
        @error('tempat_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- tanggal lahir --}}
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
            value="{{ old('tanggal_lahir') }}">
        @error('tanggal_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- status pernikahan --}}
    <div class="form-group">
        <label>Status Pernikahan</label>
        <select class="form-control @error('status_pernikahan') is-invalid @enderror" name="status_pernikahan">
            <option value="" selected>Pilih Status</option>
            @foreach ($dataStatusPernikahan as $statusPernikahan)
                <option value="{{ $statusPernikahan->id }}" @selected(old('status_pernikahan') == $statusPernikahan->id)>{{ $statusPernikahan->status }}
                </option>
            @endforeach
        </select>
        @error('status_pernikahan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- status surat nikah --}}
    <div class="form-group">
        <label>Status Surat Nikah</label>
        <select class="form-control @error('status_surat_nikah') is-invalid @enderror" name="status_surat_nikah">
            <option value="" selected>Pilih Status</option>
            <option value="ya" @selected(old('status_surat_nikah') == 'ya')>Ya</option>
            <option value="tidak" @selected(old('status_surat_nikah') == 'tidak')>Tidak</option>
        </select>
        @error('status_surat_nikah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- nomor surat nikah --}}
    <div class="form-group">
        <label>Nomor Surat Nikah</label>
        <input type="text" class="form-control @error('no_surat_nikah') is-invalid @enderror" name="no_surat_nikah"
            value="{{ old('no_surat_nikah') }}">
        @error('no_surat_nikah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- agama --}}
    <div class="form-group">
        <label>Agama</label>
        <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="selectAgama">
            <option value="" selected>Pilih Agama</option>
            @foreach ($dataAgama as $agama)
                <option value="{{ $agama->id }}" @selected(old('agama') == $agama->id)>{{ $agama->nama }}
                </option>
            @endforeach
        </select>
        @error('agama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxAgamaLainnya" name="checkbox_agama_lainnya"
                    value="true" @checked(old('checkbox_agama_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxAgamaLainnya">Agama Lainnya</label>
            </div>
            <input type="text" id="inputAgamaLainnya"
                class="form-control mt-1 @error('agama_lainnya') is-invalid @enderror" name="agama_lainnya"
                value="{{ old('agama_lainnya') }}" disabled="true">
            @error('agama_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- golongan darah --}}
    <div class="form-group">
        <label>Golongan Darah</label>
        <select class="form-control @error('golongan_darah') is-invalid @enderror" name="golongan_darah">
            <option value="" selected>Pilih Golongan Darah</option>
            <option value="o" @selected(old('golongan_darah') == 'o')>O</option>
            <option value="a" @selected(old('golongan_darah') == 'a')>A</option>
            <option value="b" @selected(old('golongan_darah') == 'b')>B</option>
            <option value="ab" @selected(old('golongan_darah') == 'ab')>AB</option>
        </select>
        @error('golongan_darah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- hubungan keluarga --}}
    <div class="form-group">
        <label>Hubungan Dengan Kepala Keluarga</label>
        <select class="form-control @error('hubungan_keluarga') is-invalid @enderror" name="hubungan_keluarga"
            id="selectHubungan">
            <option value="" selected>Pilih Hubungan</option>
            @foreach ($dataHubunganKeluarga as $hubunganKeluarga)
                <option value="{{ $hubunganKeluarga->id }}" @selected(old('hubungan_keluarga') == $hubunganKeluarga->id)>{{ $hubunganKeluarga->nama }}
                </option>
            @endforeach
        </select>
        @error('hubungan_keluarga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxHubunganLainnya"
                    name="checkbox_hubungan_keluarga_lainnya" value="true" @checked(old('checkbox_hubungan_keluarga_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxHubunganLainnya">Hubungan Keluarga Lainnya</label>
            </div>
            <input type="text" id="inputHubunganLainnya"
                class="form-control mt-1 @error('hubungan_keluarga_lainnya') is-invalid @enderror"
                name="hubungan_keluarga_lainnya" value="{{ old('hubungan_keluarga_lainnya') }}" disabled="true">
            @error('hubungan_keluarga_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- akseptor kb --}}
    <div class="form-group">
        <label>Akseptor KB</label>
        <select class="form-control @error('akseptor_kb') is-invalid @enderror" name="akseptor_kb"
            id="selectAkseptorKB">
            <option value="" selected>Pilih Akseptor KB</option>
            @foreach ($dataAkseptorKB as $akseptorKB)
                <option value="{{ $akseptorKB->id }}" @selected(old('akseptor_kb') == $akseptorKB->id)>{{ $akseptorKB->nama }}
                </option>
            @endforeach
        </select>
        @error('akseptor_kb')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxAkseptorKBLainnya"
                    name="checkbox_akseptor_kb_lainnya" value="true" @selected(old('checkbox_akseptor_kb_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxAkseptorKBLainnya">Akseptor KB Lainnya</label>
            </div>
            <input type="text" id="inputAkseptorKBLainnya"
                class="form-control mt-1 @error('akseptor_kb_lainnya') is-invalid @enderror" name="akseptor_kb_lainnya"
                value="{{ old('akseptor_kb_lainnya') }}" disabled="true">
            @error('akseptor_kb_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- suku --}}
    <div class="form-group">
        <label>Suku</label>
        <select class="form-control @error('suku') is-invalid @enderror" name="suku" id="selectSuku">
            <option value="" selected>Pilih Suku</option>
            @foreach ($dataSuku as $suku)
                <option value="{{ $suku->id }}" @selected(old('suku') == $suku->id)>{{ $suku->nama }}
                </option>
            @endforeach
        </select>
        @error('suku')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxSukuLainnya"
                    name="checkbox_suku_lainnya" value="true" @selected(old('checkbox_suku_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxSukuLainnya">Suku Lainnya</label>
            </div>
            <input type="text" id="inputSukuLainnya"
                class="form-control mt-1 @error('suku_lainnya') is-invalid @enderror" name="suku_lainnya"
                value="{{ old('suku_lainnya') }}" disabled="true">
            @error('suku_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- nama ortu --}}
    <div class="form-group">
        <label>Nama Bapak/Ibu Kandung</label>
        <input type="text" class="form-control @error('nama_ortu') is-invalid @enderror" name="nama_ortu"
            value="{{ old('nama_ortu') }}">
        @error('nama_ortu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- warganegara --}}
    <div class="form-group">
        <label>Warganegara</label>
        <select class="form-control @error('warganegara') is-invalid @enderror" name="warganegara">
            <option value="" selected>Pilih Warganegara</option>
            <option value="wni" @selected(old('warganegara') == 'wni')>WNI</option>
            <option value="wna" @selected(old('warganegara') == 'wna')>WNA</option>
        </select>
        @error('warganegara')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- no hp --}}
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
            value="{{ old('no_hp') }}">
        @error('no_hp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- no wa --}}
    <div class="form-group">
        <label>Nomor Whatsapp</label>
        <input type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa"
            value="{{ old('no_wa') }}">
        @error('no_wa')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- email --}}
    <div class="form-group">
        <label>Alamat Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- facebook --}}
    <div class="form-group">
        <label>Alamat Facebook Pribadi</label>
        <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook"
            value="{{ old('facebook') }}">
        @error('facebook')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- twitter --}}
    <div class="form-group">
        <label>Alamat Twitter Pribadi</label>
        <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter"
            value="{{ old('twitter') }}">
        @error('twitter')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- instagram --}}
    <div class="form-group">
        <label>Alamat Instagram Pribadi</label>
        <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram"
            value="{{ old('instagram') }}">
        @error('instagram')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection

@push('scripts')
    <script>
        const inputAgamaLainnya = document.querySelector("#inputAgamaLainnya")
        const selectAgama = document.querySelector("#selectAgama")
        document.querySelector("#checkboxAgamaLainnya").addEventListener("click", function() {
            if (inputAgamaLainnya.hasAttribute("disabled")) {
                inputAgamaLainnya.removeAttribute("disabled")
                selectAgama.setAttribute("disabled", true)
            } else {
                inputAgamaLainnya.setAttribute("disabled", true)
                selectAgama.removeAttribute("disabled")
            }
        })

        const inputHubunganLainnya = document.querySelector("#inputHubunganLainnya")
        const selectHubungan = document.querySelector("#selectHubungan")
        document.querySelector("#checkboxHubunganLainnya").addEventListener("click", function() {
            if (inputHubunganLainnya.hasAttribute("disabled")) {
                inputHubunganLainnya.removeAttribute("disabled")
                selectHubungan.setAttribute("disabled", true)
            } else {
                inputHubunganLainnya.setAttribute("disabled", true)
                selectHubungan.removeAttribute("disabled")
            }
        })

        const inputAkseptorKBLainnya = document.querySelector("#inputAkseptorKBLainnya")
        const selectAkseptorKB = document.querySelector("#selectAkseptorKB")
        document.querySelector("#checkboxAkseptorKBLainnya").addEventListener("click", function() {
            if (inputAkseptorKBLainnya.hasAttribute("disabled")) {
                inputAkseptorKBLainnya.removeAttribute("disabled")
                selectAkseptorKB.setAttribute("disabled", true)
            } else {
                inputAkseptorKBLainnya.setAttribute("disabled", true)
                selectAkseptorKB.removeAttribute("disabled")
            }
        })

        const inputSukuLainnya = document.querySelector("#inputSukuLainnya")
        const selectSuku = document.querySelector("#selectSuku")
        document.querySelector("#checkboxSukuLainnya").addEventListener("click", function() {
            if (inputSukuLainnya.hasAttribute("disabled")) {
                inputSukuLainnya.removeAttribute("disabled")
                selectSuku.setAttribute("disabled", true)
            } else {
                inputSukuLainnya.setAttribute("disabled", true)
                selectSuku.removeAttribute("disabled")
            }
        })
    </script>
@endpush
