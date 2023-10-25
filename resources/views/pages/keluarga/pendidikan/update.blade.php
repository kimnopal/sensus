@extends('pages.layouts.update')

@section('timeline')
    @include('pages.keluarga.timeline', ['operation' => 'edit'])
@endsection

@section('form_field')
    {{-- anak bersekolah --}}
    <div class="form-group">
        <label>Keluarga dengan anak Usia 7-18 tahun bersekolah</label>
        <select class="form-control @error('anak_bersekolah') is-invalid @enderror" name="anak_bersekolah">
            <option value="" selected>Pilih Status</option>
            <option value="ada" @selected(old('anak_bersekolah', $data->anak_bersekolah) == 'ada')>Ada</option>
            <option value="tidak" @selected(old('anak_bersekolah', $data->anak_bersekolah) == 'tidak')>Tidak</option>
        </select>
        @error('anak_bersekolah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- anak putus bersekolah --}}
    <div class="form-group">
        <label>Keluarga dengan Anak Usia 7-18 tahun Putus Sekolah</label>
        <select class="form-control @error('anak_putus_sekolah') is-invalid @enderror" name="anak_putus_sekolah">
            <option value="" selected>Pilih Status</option>
            <option value="ada" @selected(old('anak_putus_sekolah', $data->anak_putus_sekolah) == 'ada')>Ada</option>
            <option value="tidak" @selected(old('anak_putus_sekolah', $data->anak_putus_sekolah) == 'tidak')>Tidak</option>
        </select>
        @error('anak_putus_sekolah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- buta huruf --}}
    <div class="form-group">
        <label>Ada anggota keluarga tidak bisa baca tulis</label>
        <select class="form-control @error('buta_huruf') is-invalid @enderror" name="buta_huruf">
            <option value="" selected>Pilih Status</option>
            <option value="ada" @selected(old('buta_huruf', $data->buta_huruf) == 'ada')>Ada</option>
            <option value="tidak" @selected(old('buta_huruf', $data->buta_huruf) == 'tidak')>Tidak</option>
        </select>
        @error('buta_huruf')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- akses pendidikan --}}
    <div class="form-group">
        <label class="mb-2">Akses Pendidikan terdekat</label>
        <div id="accordion">
            @foreach ($dataJenisPendidikan as $jenisPendidikan)
                <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse"
                        data-target="#panel-body-{{ $jenisPendidikan->id }}" aria-expanded="false"
                        data-sumber-penghasilan=1>
                        <h4 class="accordion-title">{{ $jenisPendidikan->jenis }}</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-{{ $jenisPendidikan->id }}"
                        data-parent="#accordion">

                        {{-- jarak tempuh --}}
                        <div class="form-group">
                            <label>Jarak</label>
                            @forelse ($data->list_akses_pendidikan as $aksesPendidikan)
                                @if ($aksesPendidikan->jenis_pendidikan_id == $jenisPendidikan->id)
                                    <div
                                        class="input-group @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') is-invalid @enderror">
                                        <input type="text"
                                            class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') is-invalid @enderror"
                                            name="akses_pendidikan[{{ $jenisPendidikan->id }}][jarak_tempuh]"
                                            value="{{ old('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh', $aksesPendidikan->jarak_tempuh) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">km</span>
                                        </div>
                                    </div>
                                @break

                            @else
                                @if ($loop->last)
                                    <div
                                        class="input-group @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') is-invalid @enderror">
                                        <input type="text"
                                            class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') is-invalid @enderror"
                                            name="akses_pendidikan[{{ $jenisPendidikan->id }}][jarak_tempuh]"
                                            value="{{ old('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">km</span>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @empty
                            <div
                                class="input-group @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') is-invalid @enderror">
                                <input type="text"
                                    class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') is-invalid @enderror"
                                    name="akses_pendidikan[{{ $jenisPendidikan->id }}][jarak_tempuh]"
                                    value="{{ old('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">km</span>
                                </div>
                            </div>
                        @endforelse

                        @error('akses_pendidikan.' . $jenisPendidikan->id . '.jarak_tempuh')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- waktu tempuh --}}
                    <div class="form-group">
                        <label>Waktu Tempuh</label>
                        @forelse ($data->list_akses_pendidikan as $aksesPendidikan)
                            @if ($aksesPendidikan->jenis_pendidikan_id == $jenisPendidikan->id)
                                <div
                                    class="input-group @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') is-invalid @enderror">
                                    <input type="text"
                                        class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') is-invalid @enderror"
                                        name="akses_pendidikan[{{ $jenisPendidikan->id }}][waktu_tempuh]"
                                        value="{{ old('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh', $aksesPendidikan->waktu_tempuh) }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">jam</span>
                                    </div>
                                </div>
                            @break

                        @else
                            @if ($loop->last)
                                <div
                                    class="input-group @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') is-invalid @enderror">
                                    <input type="text"
                                        class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') is-invalid @enderror"
                                        name="akses_pendidikan[{{ $jenisPendidikan->id }}][waktu_tempuh]"
                                        value="{{ old('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">jam</span>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                        <div
                            class="input-group @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') is-invalid @enderror">
                            <input type="text"
                                class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') is-invalid @enderror"
                                name="akses_pendidikan[{{ $jenisPendidikan->id }}][waktu_tempuh]"
                                value="{{ old('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">jam</span>
                            </div>
                        </div>
                    @endforelse

                    @error('akses_pendidikan.' . $jenisPendidikan->id . '.waktu_tempuh')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- status --}}
                <div class="form-group">
                    <label>Status</label>
                    @forelse ($data->list_akses_pendidikan as $aksesPendidikan)
                        @if ($aksesPendidikan->jenis_pendidikan_id == $jenisPendidikan->id)
                            <select
                                class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.status') is-invalid @enderror"
                                name="akses_pendidikan[{{ $jenisPendidikan->id }}][status]">
                                <option value="" selected>Pilih Status</option>

                                <option value="mudah" @selected(old('akses_pendidikan.' . $jenisPendidikan->id . '.status', $aksesPendidikan->status) == 'mudah')>Mudah</option>

                                <option value="sulit" @selected(old('akses_pendidikan.' . $jenisPendidikan->id . '.status', $aksesPendidikan->status) == 'sulit')>Sulit</option>
                            </select>
                        @break

                    @else
                        @if ($loop->last)
                            <select
                                class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.status') is-invalid @enderror"
                                name="akses_pendidikan[{{ $jenisPendidikan->id }}][status]">
                                <option value="" selected>Pilih Status</option>

                                <option value="mudah" @selected(old('akses_pendidikan.' . $jenisPendidikan->id . '.status') == 'mudah')>Mudah</option>

                                <option value="sulit" @selected(old('akses_pendidikan.' . $jenisPendidikan->id . '.status') == 'sulit')>Sulit</option>
                            </select>
                        @endif
                    @endif
                @empty
                    <select
                        class="form-control @error('akses_pendidikan.' . $jenisPendidikan->id . '.status') is-invalid @enderror"
                        name="akses_pendidikan[{{ $jenisPendidikan->id }}][status]">
                        <option value="" selected>Pilih Status</option>

                        <option value="mudah" @selected(old('akses_pendidikan.' . $jenisPendidikan->id . '.status') == 'mudah')>Mudah</option>

                        <option value="sulit" @selected(old('akses_pendidikan.' . $jenisPendidikan->id . '.status') == 'sulit')>Sulit</option>
                    </select>
                @endforelse
                @error('akses_pendidikan.' . $jenisPendidikan->id . '.status')
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
@endsection
