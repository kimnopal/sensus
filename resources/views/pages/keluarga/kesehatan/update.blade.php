@extends('pages.layouts.update')

@section('timeline')
    @include('pages.keluarga.timeline', ['operation' => 'edit'])
@endsection

@section('form_field')
    {{-- keluarga posyandu --}}
    <div class="form-group">
        <label>Keluarga Balita Ikut Posyandu</label>
        <select class="form-control @error('keluarga_posyandu') is-invalid @enderror" name="keluarga_posyandu">
            <option value="" selected>Pilih Status</option>
            <option value="ya" @selected(old('keluarga_posyandu', $data->keluarga_posyandu) == 'ya')>Ya</option>
            <option value="tidak" @selected(old('keluarga_posyandu', $data->keluarga_posyandu) == 'tidak')>Tidak</option>
        </select>
        @error('keluarga_posyandu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- bayi gizi baik --}}
    <div class="form-group">
        <label>Bayi/Balita Gizi Baik</label>
        <select class="form-control @error('bayi_gizi_baik') is-invalid @enderror" name="bayi_gizi_baik">
            <option value="" selected>Pilih Status</option>
            <option value="ya" @selected(old('bayi_gizi_baik', $data->bayi_gizi_baik) == 'ya')>Ya</option>
            <option value="tidak" @selected(old('bayi_gizi_baik', $data->bayi_gizi_baik) == 'tidak')>Tidak</option>
        </select>
        @error('bayi_gizi_baik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- lansia posyandu --}}
    <div class="form-group">
        <label>Lansia datang ke Posyandu</label>
        <select class="form-control @error('lansia_posyandu') is-invalid @enderror" name="lansia_posyandu">
            <option value="" selected>Pilih Status</option>
            <option value="ya" @selected(old('lansia_posyandu', $data->lansia_posyandu) == 'ya')>Ya</option>
            <option value="tidak" @selected(old('lansia_posyandu', $data->lansia_posyandu) == 'tidak')>Tidak</option>
        </select>
        @error('lansia_posyandu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- keluarga jaskesmas --}}
    <div class="form-group">
        <label>Keluarga Miskin punya BPJS/KIS/Waluya</label>
        <select class="form-control @error('keluarga_jaskesmas') is-invalid @enderror" name="keluarga_jaskesmas">
            <option value="" selected>Pilih Status</option>
            <option value="ya" @selected(old('keluarga_jaskesmas', $data->keluarga_jaskesmas) == 'ya')>Ya</option>
            <option value="tidak" @selected(old('keluarga_jaskesmas', $data->keluarga_jaskesmas) == 'tidak')>Tidak</option>
        </select>
        @error('keluarga_jaskesmas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- akses faskes --}}
    <div class="form-group">
        <label class="mb-2">Akses Fasilitas Kesehatan terdekat</label>
        <div class="form-group mt-2">
            <div class="btn btn-primary d-block w-100" role="button" id="show-faskes">Tampilkan Fasilitas Kesehatan
                terdekat</div>
        </div>
        <div id="accordion-1" style="display:none;">
            @foreach ($dataJenisFaskes as $jenisFaskes)
                <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse"
                        data-target="#panel-body-faskes-{{ $jenisFaskes->id }}" aria-expanded="false">
                        <h4 class="accordion-title">{{ $jenisFaskes->jenis }}</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-faskes-{{ $jenisFaskes->id }}"
                        data-parent="#accordion-1">
                        {{-- jarak tempuh --}}
                        <div class="form-group">
                            <label>Jarak</label>
                            @forelse ($data->list_akses_faskes as $akses_faskes)
                                @if ($akses_faskes->jenis_faskes_id == $jenisFaskes->id)
                                    <div
                                        class="input-group @error('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh') is-invalid @enderror">
                                        <input type="text"
                                            class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh') is-invalid @enderror"
                                            name="akses_faskes[{{ $jenisFaskes->id }}][jarak_tempuh]"
                                            value="{{ old('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh', $akses_faskes->jarak_tempuh) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">km</span>
                                        </div>
                                    </div>
                                @break

                            @else
                                @if ($loop->last)
                                    <div
                                        class="input-group @error('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh') is-invalid @enderror">
                                        <input type="text"
                                            class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh') is-invalid @enderror"
                                            name="akses_faskes[{{ $jenisFaskes->id }}][jarak_tempuh]"
                                            value="{{ old('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">km</span>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @empty
                            <div
                                class="input-group @error('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh') is-invalid @enderror">
                                <input type="text"
                                    class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh') is-invalid @enderror"
                                    name="akses_faskes[{{ $jenisFaskes->id }}][jarak_tempuh]"
                                    value="{{ old('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">km</span>
                                </div>
                            </div>
                        @endforelse

                        @error('akses_faskes.' . $jenisFaskes->id . '.jarak_tempuh')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- waktu tempuh --}}
                    <div class="form-group">
                        <label>Waktu Tempuh</label>
                        @forelse ($data->list_akses_faskes as $akses_faskes)
                            @if ($akses_faskes->jenis_faskes_id == $jenisFaskes->id)
                                <div
                                    class="input-group @error('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh') is-invalid @enderror">
                                    <input type="text"
                                        class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh') is-invalid @enderror"
                                        name="akses_faskes[{{ $jenisFaskes->id }}][waktu_tempuh]"
                                        value="{{ old('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh', $akses_faskes->waktu_tempuh) }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">jam</span>
                                    </div>
                                </div>
                            @break

                        @else
                            @if ($loop->last)
                                <div
                                    class="input-group @error('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh') is-invalid @enderror">
                                    <input type="text"
                                        class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh') is-invalid @enderror"
                                        name="akses_faskes[{{ $jenisFaskes->id }}][waktu_tempuh]"
                                        value="{{ old('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">jam</span>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                        <div
                            class="input-group @error('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh') is-invalid @enderror">
                            <input type="text"
                                class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh') is-invalid @enderror"
                                name="akses_faskes[{{ $jenisFaskes->id }}][waktu_tempuh]"
                                value="{{ old('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">jam</span>
                            </div>
                        </div>
                    @endforelse

                    @error('akses_faskes.' . $jenisFaskes->id . '.waktu_tempuh')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- status --}}
                <div class="form-group">
                    <label>Status</label>
                    @forelse ($data->list_akses_faskes as $akses_faskes)
                        @if ($akses_faskes->jenis_faskes_id == $jenisFaskes->id)
                            <select
                                class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.status') is-invalid @enderror"
                                name="akses_faskes[{{ $jenisFaskes->id }}][status]">
                                <option value="" selected>Pilih Status</option>

                                <option value="mudah" @selected(old('akses_faskes.' . $jenisFaskes->id . '.status', $akses_faskes->status) == 'mudah')>Mudah</option>

                                <option value="sulit" @selected(old('akses_faskes.' . $jenisFaskes->id . '.status', $akses_faskes->status) == 'sulit')>Sulit</option>
                            </select>
                        @break

                    @else
                        @if ($loop->last)
                            <select
                                class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.status') is-invalid @enderror"
                                name="akses_faskes[{{ $jenisFaskes->id }}][status]">
                                <option value="" selected>Pilih Status</option>

                                <option value="mudah" @selected(old('akses_faskes.' . $jenisFaskes->id . '.status') == 'mudah')>Mudah</option>

                                <option value="sulit" @selected(old('akses_faskes.' . $jenisFaskes->id . '.status') == 'sulit')>Sulit</option>
                            </select>
                        @endif
                    @endif
                @empty
                    <select
                        class="form-control @error('akses_faskes.' . $jenisFaskes->id . '.status') is-invalid @enderror"
                        name="akses_faskes[{{ $jenisFaskes->id }}][status]">
                        <option value="" selected>Pilih Status</option>

                        <option value="mudah" @selected(old('akses_faskes.' . $jenisFaskes->id . '.status') == 'mudah')>Mudah</option>

                        <option value="sulit" @selected(old('akses_faskes.' . $jenisFaskes->id . '.status') == 'sulit')>Sulit</option>
                    </select>
                @endforelse

                @error('akses_faskes.' . $jenisFaskes->id . '.status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
@endforeach

</div>
</div>

{{-- akses tenaga kesehatan --}}
<div class="form-group">
<label class="mb-2">Akses Tenaga Kesehatan Terdekat</label>
<div class="form-group mt-2">
<div class="btn btn-primary d-block w-100" role="button" id="show-tenaga-kesehatan">Tampilkan Akses Tenaga
    Kesehatan
    Terdekat</div>
</div>
<div id="accordion-2" style="display:none;">
@foreach ($dataJenisTenagaKesehatan as $jenisTenagaKesehatan)
    <div class="accordion">
        <div class="accordion-header" role="button" data-toggle="collapse"
            data-target="#panel-body-tenaga-kesehatan-{{ $jenisTenagaKesehatan->id }}" aria-expanded="false">
            <h4 class="accordion-title">{{ $jenisTenagaKesehatan->jenis }}</h4>
        </div>
        <div class="accordion-body collapse" id="panel-body-tenaga-kesehatan-{{ $jenisTenagaKesehatan->id }}"
            data-parent="#accordion-2">

            {{-- jarak tempuh --}}
            <div class="form-group">
                <label>Jarak</label>
                @forelse ($data->list_akses_tenaga_kesehatan as $akses_tenaga_kesehatan)
                    @if ($akses_tenaga_kesehatan->jenis_tenaga_kesehatan_id == $jenisTenagaKesehatan->id)
                        <div
                            class="input-group @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh') is-invalid @enderror">
                            <input type="text"
                                class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh') is-invalid @enderror"
                                name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][jarak_tempuh]"
                                value="{{ old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh', $akses_tenaga_kesehatan->jarak_tempuh) }}">
                            <div class="input-group-append">
                                <span class="input-group-text">km</span>
                            </div>
                        </div>
                    @break

                @else
                    @if ($loop->last)
                        <div
                            class="input-group @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh') is-invalid @enderror">
                            <input type="text"
                                class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh') is-invalid @enderror"
                                name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][jarak_tempuh]"
                                value="{{ old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">km</span>
                            </div>
                        </div>
                    @endif
                @endif
            @empty
                <div
                    class="input-group @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh') is-invalid @enderror">
                    <input type="text"
                        class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh') is-invalid @enderror"
                        name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][jarak_tempuh]"
                        value="{{ old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh') }}">
                    <div class="input-group-append">
                        <span class="input-group-text">km</span>
                    </div>
                </div>
            @endforelse

            @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.jarak_tempuh')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- waktu tempuh --}}
        <div class="form-group">
            <label>Waktu Tempuh</label>
            @forelse ($data->list_akses_tenaga_kesehatan as $akses_tenaga_kesehatan)
                @if ($akses_tenaga_kesehatan->jenis_tenaga_kesehatan_id == $jenisTenagaKesehatan->id)
                    <div
                        class="input-group @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh') is-invalid @enderror">
                        <input type="text"
                            class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh') is-invalid @enderror"
                            name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][waktu_tempuh]"
                            value="{{ old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh', $akses_tenaga_kesehatan->waktu_tempuh) }}">
                        <div class="input-group-append">
                            <span class="input-group-text">jam</span>
                        </div>
                    </div>
                @break

            @else
                @if ($loop->last)
                    <div
                        class="input-group @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh') is-invalid @enderror">
                        <input type="text"
                            class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh') is-invalid @enderror"
                            name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][waktu_tempuh]"
                            value="{{ old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh') }}">
                        <div class="input-group-append">
                            <span class="input-group-text">jam</span>
                        </div>
                    </div>
                @endif
            @endif
        @empty
            <div
                class="input-group @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh') is-invalid @enderror">
                <input type="text"
                    class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh') is-invalid @enderror"
                    name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][waktu_tempuh]"
                    value="{{ old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh') }}">
                <div class="input-group-append">
                    <span class="input-group-text">jam</span>
                </div>
            </div>
        @endforelse

        @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.waktu_tempuh')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- status --}}
    <div class="form-group">
        <label>Status</label>
        @forelse ($data->list_akses_tenaga_kesehatan as $akses_tenaga_kesehatan)
            @if ($akses_tenaga_kesehatan->jenis_tenaga_kesehatan_id == $jenisTenagaKesehatan->id)
                <select
                    class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status') is-invalid @enderror"
                    name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][status]">
                    <option value="" selected>Pilih Status</option>

                    <option value="mudah" @selected(old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status', $akses_tenaga_kesehatan->status) == 'mudah')>Mudah</option>

                    <option value="sulit" @selected(old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status', $akses_tenaga_kesehatan->status) == 'sulit')>Sulit</option>
                </select>
            @break

        @else
            @if ($loop->last)
                <select
                    class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status') is-invalid @enderror"
                    name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][status]">
                    <option value="" selected>Pilih Status</option>

                    <option value="mudah" @selected(old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status') == 'mudah')>Mudah</option>

                    <option value="sulit" @selected(old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status') == 'sulit')>Sulit</option>
                </select>
            @endif
        @endif
    @empty
        <select
            class="form-control @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status') is-invalid @enderror"
            name="akses_tenaga_kesehatan[{{ $jenisTenagaKesehatan->id }}][status]">
            <option value="" selected>Pilih Status</option>

            <option value="mudah" @selected(old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status') == 'mudah')>Mudah</option>

            <option value="sulit" @selected(old('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status') == 'sulit')>Sulit</option>
        </select>
    @endforelse

    @error('akses_tenaga_kesehatan.' . $jenisTenagaKesehatan->id . '.status')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
</div>
</div>
@endforeach

</div>
</div>

{{-- pus kb --}}
<div class="form-group">
<label>PUS ber-KB</label>
<select class="form-control @error('pus_kb') is-invalid @enderror" name="pus_kb">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('pus_kb', $data->pus_kb) == 'ya')>Ya</option>
<option value="tidak" @selected(old('pus_kb', $data->pus_kb) == 'tidak')>Tidak</option>
</select>
@error('pus_kb')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- pus tidak kb --}}
<div class="form-group">
<label>PUS tidak ber-KB Unmeet Need</label>
<select class="form-control @error('pus_tidak_kb') is-invalid @enderror" name="pus_tidak_kb">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('pus_tidak_kb', $data->pus_tidak_kb) == 'ya')>Ya</option>
<option value="tidak" @selected(old('pus_tidak_kb', $data->pus_tidak_kb) == 'tidak')>Tidak</option>
</select>
@error('pus_tidak_kb')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- keluarga bkb --}}
<div class="form-group">
<label>Keluarga Balita ikut BKB</label>
<select class="form-control @error('keluarga_bkb') is-invalid @enderror" name="keluarga_bkb">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('keluarga_bkb', $data->keluarga_bkb) == 'ya')>Ya</option>
<option value="tidak" @selected(old('keluarga_bkb', $data->keluarga_bkb) == 'tidak')>Tidak</option>
</select>
@error('keluarga_bkb')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- keluarga bkr --}}
<div class="form-group">
<label>Keluarga Remaja ikut BKR</label>
<select class="form-control @error('keluarga_bkr') is-invalid @enderror" name="keluarga_bkr">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('keluarga_bkr', $data->keluarga_bkr) == 'ya')>Ya</option>
<option value="tidak" @selected(old('keluarga_bkr', $data->keluarga_bkr) == 'tidak')>Tidak</option>
</select>
@error('keluarga_bkr')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- keluarga bkl --}}
<div class="form-group">
<label>Keluarga Remaja ikut BKL</label>
<select class="form-control @error('keluarga_bkl') is-invalid @enderror" name="keluarga_bkl">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('keluarga_bkl', $data->keluarga_bkl) == 'ya')>Ya</option>
<option value="tidak" @selected(old('keluarga_bkl', $data->keluarga_bkl) == 'tidak')>Tidak</option>
</select>
@error('keluarga_bkl')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- keluarga uppks --}}
<div class="form-group">
<label>Keluarga ikut Kelompok UPPKS</label>
<select class="form-control @error('keluarga_uppks') is-invalid @enderror" name="keluarga_uppks">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('keluarga_uppks', $data->keluarga_uppks) == 'ya')>Ya</option>
<option value="tidak" @selected(old('keluarga_uppks', $data->keluarga_uppks) == 'tidak')>Tidak</option>
</select>
@error('keluarga_uppks')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- peserta paguyuban --}}
<div class="form-group">
<label>Peserta KB Pria ikut Paguyuban</label>
<select class="form-control @error('peserta_paguyuban') is-invalid @enderror" name="peserta_paguyuban">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('peserta_paguyuban', $data->peserta_paguyuban) == 'ya')>Ya</option>
<option value="tidak" @selected(old('peserta_paguyuban', $data->peserta_paguyuban) == 'tidak')>Tidak</option>
</select>
@error('peserta_paguyuban')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- remaja pikr --}}
<div class="form-group">
<label>Remaja ikut PIK-R</label>
<select class="form-control @error('remaja_pikr') is-invalid @enderror" name="remaja_pikr">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('remaja_pikr', $data->remaja_pikr) == 'ya')>Ya</option>
<option value="tidak" @selected(old('remaja_pikr', $data->remaja_pikr) == 'tidak')>Tidak</option>
</select>
@error('remaja_pikr')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- remaja saka kencana --}}
<div class="form-group">
<label>Remaja ikut Saka Kencana</label>
<select class="form-control @error('remaja_saka_kencana') is-invalid @enderror" name="remaja_saka_kencana">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('remaja_saka_kencana', $data->remaja_saka_kencana) == 'ya')>Ya</option>
<option value="tidak" @selected(old('remaja_saka_kencana', $data->remaja_saka_kencana) == 'tidak')>Tidak</option>
</select>
@error('remaja_saka_kencana')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- sarana prasarana transportasi --}}
<div class="form-group">
<label class="mb-2">Akses Prasarana dan Sarana Transportasi</label>
<div class="form-group mt-2">
<div class="btn btn-primary d-block w-100" role="button" id="show-sarana">Tampilkan Akses Prasarana dan
Sarana Transportasi</div>
</div>
<div id="accordion-3" style="display:none;">
@foreach ($dataTujuanTransportasi as $tujuanTransportasi)
<div class="accordion">
<div class="accordion-header" role="button" data-toggle="collapse"
data-target="#panel-body-sarana-{{ $tujuanTransportasi->id }}" aria-expanded="false">
<h4 class="accordion-title">{{ $tujuanTransportasi->tujuan }}</h4>
</div>
<div class="accordion-body collapse" id="panel-body-sarana-{{ $tujuanTransportasi->id }}"
data-parent="#accordion-3">

{{-- jenis transportasi terlama --}}
<div class="form-group">
    <label>Jenis Transportasi terlama</label>
    @forelse ($data->list_sarana_prasarana_transportasi as $sarana_prasarana_transportasi)
        @if ($sarana_prasarana_transportasi->tujuan_transportasi_id == $tujuanTransportasi->id)
            <select
                class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') is-invalid @enderror"
                name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][jenis_transportasi_terlama]">
                <option value="" selected>Pilih Jenis Transportasi Terlama</option>

                <option value="darat" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama', $sarana_prasarana_transportasi->jenis_transportasi_terlama) == 'darat')>Darat</option>

                <option value="air" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama', $sarana_prasarana_transportasi->jenis_transportasi_terlama) == 'air')>Air</option>

                <option value="udara" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama', $sarana_prasarana_transportasi->jenis_transportasi_terlama) == 'udara')>Udara</option>
            </select>
        @break

    @else
        @if ($loop->last)
            <select
                class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') is-invalid @enderror"
                name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][jenis_transportasi_terlama]">
                <option value="" selected>Pilih Jenis Transportasi Terlama</option>

                <option value="darat" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') == 'darat')>Darat</option>

                <option value="air" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') == 'air')>Air</option>

                <option value="udara" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') == 'udara')>Udara</option>
            </select>
        @endif
    @endif
@empty
    <select
        class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') is-invalid @enderror"
        name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][jenis_transportasi_terlama]">
        <option value="" selected>Pilih Jenis Transportasi Terlama</option>

        <option value="darat" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') == 'darat')>Darat</option>

        <option value="air" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') == 'air')>Air</option>

        <option value="udara" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.jenis_transportasi_terlama') == 'udara')>Udara</option>
    </select>
@endforelse

@error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id .
    '.jenis_transportasi_terlama')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
</div>

{{-- penggunaan transportasi umum --}}
<div class="form-group">
<label>Penggunaan transportasi umum</label>
@forelse ($data->list_sarana_prasarana_transportasi as $sarana_prasarana_transportasi)
    @if ($sarana_prasarana_transportasi->tujuan_transportasi_id == $tujuanTransportasi->id)
        <select
            class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum') is-invalid @enderror"
            name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][penggunaan_transportasi_umum]">
            <option value="" selected>Pilih Jenis Transportasi Terlama</option>

            <option value="ya" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum', $sarana_prasarana_transportasi->penggunaan_transportasi_umum) == 'ya')>Ya</option>

            <option value="tidak" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum', $sarana_prasarana_transportasi->penggunaan_transportasi_umum) == 'tidak')>Tidak</option>
        </select>
    @break

@else
    @if ($loop->last)
        <select
            class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum') is-invalid @enderror"
            name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][penggunaan_transportasi_umum]">
            <option value="" selected>Pilih Jenis Transportasi Terlama</option>

            <option value="ya" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum') == 'ya')>Ya</option>

            <option value="tidak" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum') == 'tidak')>Tidak</option>
        </select>
    @endif
@endif
@empty
<select
    class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum') is-invalid @enderror"
    name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][penggunaan_transportasi_umum]">
    <option value="" selected>Pilih Jenis Transportasi Terlama</option>

    <option value="ya" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum') == 'ya')>Ya</option>

    <option value="tidak" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.penggunaan_transportasi_umum') == 'tidak')>Tidak</option>
</select>
@endforelse

@error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id .
'.penggunaan_transportasi_umum')
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
</div>

{{-- waktu tempuh --}}
<div class="form-group">
<label>Waktu tempuh sekali jalan</label>
@forelse ($data->list_sarana_prasarana_transportasi as $sarana_prasarana_transportasi)
@if ($sarana_prasarana_transportasi->tujuan_transportasi_id == $tujuanTransportasi->id)
    <div
        class="input-group @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh') is-invalid @enderror">
        <input type="text"
            class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh') is-invalid @enderror"
            name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][waktu_tempuh]"
            value="{{ old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh', $sarana_prasarana_transportasi->waktu_tempuh) }}">
        <div class="input-group-append">
            <span class="input-group-text">jam</span>
        </div>
    </div>
@break

@else
@if ($loop->last)
    <div
        class="input-group @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh') is-invalid @enderror">
        <input type="text"
            class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh') is-invalid @enderror"
            name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][waktu_tempuh]"
            value="{{ old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh') }}">
        <div class="input-group-append">
            <span class="input-group-text">jam</span>
        </div>
    </div>
@endif
@endif
@empty
<div
class="input-group @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh') is-invalid @enderror">
<input type="text"
    class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh') is-invalid @enderror"
    name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][waktu_tempuh]"
    value="{{ old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh') }}">
<div class="input-group-append">
    <span class="input-group-text">jam</span>
</div>
</div>
@endforelse

@error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.waktu_tempuh')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- biaya --}}
<div class="form-group">
<label>Biaya sekali jalan</label>
@forelse ($data->list_sarana_prasarana_transportasi as $sarana_prasarana_transportasi)
@if ($sarana_prasarana_transportasi->tujuan_transportasi_id == $tujuanTransportasi->id)
<div
    class="input-group @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya') is-invalid @enderror">
    <input type="text"
        class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya') is-invalid @enderror"
        name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][biaya]"
        value="{{ old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya', $sarana_prasarana_transportasi->biaya) }}">
    <div class="input-group-append">
        <span class="input-group-text">Rp</span>
    </div>
</div>
@break

@else
@if ($loop->last)
<div
    class="input-group @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya') is-invalid @enderror">
    <input type="text"
        class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya') is-invalid @enderror"
        name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][biaya]"
        value="{{ old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya') }}">
    <div class="input-group-append">
        <span class="input-group-text">Rp</span>
    </div>
</div>
@endif
@endif
@empty
<div
class="input-group @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya') is-invalid @enderror">
<input type="text"
class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya') is-invalid @enderror"
name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][biaya]"
value="{{ old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya') }}">
<div class="input-group-append">
<span class="input-group-text">Rp</span>
</div>
</div>
@endforelse

@error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.biaya')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- kemudahan --}}
<div class="form-group">
<label>Kemudahan</label>
@forelse ($data->list_sarana_prasarana_transportasi as $sarana_prasarana_transportasi)
@if ($sarana_prasarana_transportasi->tujuan_transportasi_id == $tujuanTransportasi->id)
<select
class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan') is-invalid @enderror"
name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][kemudahan]">
<option value="" selected>Pilih Status</option>

<option value="mudah" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan', $sarana_prasarana_transportasi->kemudahan) == 'mudah')>Mudah</option>

<option value="sulit" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan', $sarana_prasarana_transportasi->kemudahan) == 'sulit')>Sulit</option>
</select>
@break

@else
@if ($loop->last)
<select
class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan') is-invalid @enderror"
name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][kemudahan]">
<option value="" selected>Pilih Status</option>

<option value="mudah" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan') == 'mudah')>Mudah</option>

<option value="sulit" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan') == 'sulit')>Sulit</option>
</select>
@endif
@endif
@empty
<select
class="form-control @error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan') is-invalid @enderror"
name="sarana_prasarana_transportasi[{{ $tujuanTransportasi->id }}][kemudahan]">
<option value="" selected>Pilih Status</option>

<option value="mudah" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan') == 'mudah')>Mudah</option>

<option value="sulit" @selected(old('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan') == 'sulit')>Sulit</option>
</select>
@endforelse

@error('sarana_prasarana_transportasi.' . $tujuanTransportasi->id . '.kemudahan')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
</div>
</div>
@endforeach

</div>
</div>

{{-- blt --}}
<div class="form-group">
<label>BLT Dana Desa</label>
<select class="form-control @error('blt') is-invalid @enderror" name="blt">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('blt', $data->blt) == 'ya')>Ya</option>
<option value="tidak" @selected(old('blt', $data->blt) == 'tidak')>Tidak</option>
</select>
@error('blt')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- pkh --}}
<div class="form-group">
<label>Program Keluarga Harapan/PKH</label>
<select class="form-control @error('pkh') is-invalid @enderror" name="pkh">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('pkh', $data->pkh) == 'ya')>Ya</option>
<option value="tidak" @selected(old('pkh', $data->pkh) == 'tidak')>Tidak</option>
</select>
@error('pkh')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- bst --}}
<div class="form-group">
<label>Bantuan Sosial Tunai/BST</label>
<select class="form-control @error('bst') is-invalid @enderror" name="bst">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('bst', $data->bst) == 'ya')>Ya</option>
<option value="tidak" @selected(old('bst', $data->bst) == 'tidak')>Tidak</option>
</select>
@error('bst')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- banpres --}}
<div class="form-group">
<label>Bantuan Presiden/Banpres</label>
<select class="form-control @error('banpres') is-invalid @enderror" name="banpres">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('banpres', $data->banpres) == 'ya')>Ya</option>
<option value="tidak" @selected(old('banpres', $data->banpres) == 'tidak')>Tidak</option>
</select>
@error('banpres')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- bantuan umkm --}}
<div class="form-group">
<label>Bantuan UMKM</label>
<select class="form-control @error('bantuan_umkm') is-invalid @enderror" name="bantuan_umkm">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('bantuan_umkm', $data->bantuan_umkm) == 'ya')>Ya</option>
<option value="tidak" @selected(old('bantuan_umkm', $data->bantuan_umkm) == 'tidak')>Tidak</option>
</select>
@error('bantuan_umkm')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- bantuan pekerja --}}
<div class="form-group">
<label>Bantuan untuk pekerja</label>
<select class="form-control @error('bantuan_pekerja') is-invalid @enderror" name="bantuan_pekerja">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('bantuan_pekerja', $data->bantuan_pekerja) == 'ya')>Ya</option>
<option value="tidak" @selected(old('bantuan_pekerja', $data->bantuan_pekerja) == 'tidak')>Tidak</option>
</select>
@error('bantuan_pekerja')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- bantuan pendidikan --}}
<div class="form-group">
<label>Bantuan Pendidikan Anak</label>
<select class="form-control @error('bantuan_pendidikan') is-invalid @enderror" name="bantuan_pendidikan">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('bantuan_pendidikan', $data->bantuan_pendidikan) == 'ya')>Ya</option>
<option value="tidak" @selected(old('bantuan_pendidikan', $data->bantuan_pendidikan) == 'tidak')>Tidak</option>
</select>
@error('bantuan_pendidikan')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- bantuan listrik --}}
<div class="form-group">
<label>Bantuan Listrik</label>
<select class="form-control @error('bantuan_listrik') is-invalid @enderror" name="bantuan_listrik">
<option value="" selected>Pilih Status</option>
<option value="ya" @selected(old('bantuan_listrik', $data->bantuan_listrik) == 'ya')>Ya</option>
<option value="tidak" @selected(old('bantuan_listrik', $data->bantuan_listrik) == 'tidak')>Tidak</option>
</select>
@error('bantuan_listrik')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- manfaat pekarangan --}}
<div class="form-group">
<label>Keluarga sudah memanfaatkan lahan pekarangan</label>
<select class="form-control @error('manfaat_pekarangan') is-invalid @enderror" name="manfaat_pekarangan">
<option value="" selected>Pilih Status</option>
<option value="ada" @selected(old('manfaat_pekarangan', $data->manfaat_pekarangan) == 'ada')>Ada</option>
<option value="tidak" @selected(old('manfaat_pekarangan', $data->manfaat_pekarangan) == 'tidak')>Tidak</option>
</select>
@error('manfaat_pekarangan')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- keluarga tani --}}
<div class="form-group">
<label>Keluarga Petani menjadi kelompok anggota Tani/KWT</label>
<select class="form-control @error('keluarga_tani') is-invalid @enderror" name="keluarga_tani">
<option value="" selected>Pilih Status</option>
<option value="ada" @selected(old('keluarga_tani', $data->keluarga_tani) == 'ada')>Ada</option>
<option value="tidak" @selected(old('keluarga_tani', $data->keluarga_tani) == 'tidak')>Tidak</option>
</select>
@error('keluarga_tani')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

{{-- keluarga rukun nelayan --}}
<div class="form-group">
<label>Keluarga Nelayan ikut Rukun Nelayan</label>
<select class="form-control @error('keluarga_rukun_nelayan') is-invalid @enderror" name="keluarga_rukun_nelayan">
<option value="" selected>Pilih Status</option>
<option value="ada" @selected(old('keluarga_rukun_nelayan', $data->keluarga_rukun_nelayan) == 'ada')>Ada</option>
<option value="tidak" @selected(old('keluarga_rukun_nelayan', $data->keluarga_rukun_nelayan) == 'tidak')>Tidak</option>
</select>
@error('keluarga_rukun_nelayan')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
@endsection

@push('scripts')
<script>
    $("#show-faskes").off('click').click(function() {
        $("#accordion-1").toggle("slow")
    })

    $("#show-tenaga-kesehatan").off('click').click(function() {
        $("#accordion-2").toggle("slow")
    })

    $("#show-sarana").off('click').click(function() {
        $("#accordion-3").toggle("slow")
        console.log("tet");
    })
</script>
@endpush
