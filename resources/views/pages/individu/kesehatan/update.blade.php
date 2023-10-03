@extends('pages.layouts.update')

@section('timeline')
    @include('pages.layouts.timeline', ['operation' => 'edit'])
@endsection

@section('form_field')
    {{-- penyakit --}}
    <div class="form-group">
        <label class="mb-2">Penyakit yang diderita setahun terakhir</label>
        <div class="form-group mt-2">
            <div class="btn btn-primary d-block w-100" role="button" id="show-penyakit">Tampilkan Penyakit</div>
        </div>
        <div id="accordion-1" style="display:none;">
            @foreach ($dataPenyakit as $penyakit)
                <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse"
                        data-target="#panel-body-penyakit-{{ $penyakit->id }}" aria-expanded="false">
                        <h4 class="accordion-title">{{ $penyakit->nama }}</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-penyakit-{{ $penyakit->id }}"
                        data-parent="#accordion-1">

                        {{-- status penyakit --}}
                        <div class="form-group">
                            <label>Status Penyakit</label>
                            <select class="form-control @error('status_penyakit.' . $penyakit->id) is-invalid @enderror"
                                name="status_penyakit[{{ $penyakit->id }}]">
                                <option value="ya" @selected(old('status_penyakit.' . $penyakit->id) == 'ya')>Ya</option>
                                <option value="tidak" @selected(old('status_penyakit.' . $penyakit->id) != 'ya')>Tidak</option>
                            </select>

                            @error('status_penyakit.' . $penyakit->id)
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

    {{-- faskes --}}
    <div class="form-group">
        <label class="mb-2">Fasilitas kesehatan yang didatangi setahun terakhir</label>
        <div class="form-group mt-2">
            <div class="btn btn-primary d-block w-100" role="button" id="show-faskes">Tampilkan Fasilitas Kesehatan</div>
        </div>
        <div id="accordion-2" style="display:none;">
            @foreach ($dataFaskes as $faskes)
                <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse"
                        data-target="#panel-body-faskes-{{ $faskes->id }}" aria-expanded="false">
                        <h4 class="accordion-title">{{ $faskes->nama }}</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-faskes-{{ $faskes->id }}"
                        data-parent="#accordion-2">

                        {{-- frekuensi faskes --}}
                        <div class="form-group">
                            <label>Frekuensi</label>
                            <div class="input-group @error('frekuensi.' . $faskes->id) is-invalid @enderror">
                                <input type="text"
                                    class="form-control @error('frekuensi.' . $faskes->id) is-invalid @enderror"
                                    name="frekuensi[{{ $faskes->id }}]" value="{{ old('frekuensi.' . $faskes->id) }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">kali</span>
                                </div>
                            </div>
                            @error('frekuensi.' . $faskes->id)
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

    {{-- jamsoskes --}}
    <div class="form-group">
        <label>Status Jamsoskes</label>
        <select class="form-control @error('status_jamsoskes') is-invalid @enderror" name="status_jamsoskes">
            <option value="" selected>Pilih Status Jamsoskes</option>
            <option value="peserta" @selected(old('status_jamsoskes') == 'peserta')>Peserta</option>
            <option value="bukan peserta" @selected(old('status_jamsoskes') == 'bukan peserta')>Bukan Peserta</option>
        </select>
        @error('status_jamsostek')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- no jamsoskes --}}
    <div class="form-group">
        <label>Nomor peserta jaminan sosial kesehatan</label>
        <input type="text" class="form-control @error('no_jamsoskes') is-invalid @enderror" name="no_jamsoskes"
            value="{{ old('no_jamsoskes') }}">
        @error('no_jamsoskes')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- disabilitas --}}
    <div class="form-group">
        <label class="mb-2">Disabilitas</label>
        <div class="form-group mt-2">
            <div class="btn btn-primary d-block w-100" role="button" id="show-disabilitas">Tampilkan Disabilitas</div>
        </div>
        <div id="accordion-3" style="display:none;">
            @foreach ($dataDisabilitas as $disabilitas)
                <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse"
                        data-target="#panel-body-disabilitas-{{ $disabilitas->id }}" aria-expanded="false">
                        <h4 class="accordion-title">{{ $disabilitas->nama }}</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-disabilitas-{{ $disabilitas->id }}"
                        data-parent="#accordion-3">

                        {{-- status disabilitas --}}
                        <div class="form-group">
                            <label>Status Disabilitas</label>
                            <select class="form-control @error('status_disabilitas.' . $penyakit->id) is-invalid @enderror"
                                name="status_disabilitas[{{ $disabilitas->id }}]">
                                <option value="ya" @selected(old('status_disabilitas.' . $disabilitas->id) == 'ya')>Ya</option>
                                <option value="tidak" @selected(old('status_disabilitas.' . $disabilitas->id) != 'ya')>Tidak</option>
                            </select>

                            @error('status_disabilitas.' . $disabilitas->id)
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

@push('scripts')
    <script>
        $("#show-penyakit").off('click').click(function() {
            $("#accordion-1").toggle("slow")
        })

        $("#show-faskes").off('click').click(function() {
            $("#accordion-2").toggle("slow")
        })

        $("#show-disabilitas").off('click').click(function() {
            $("#accordion-3").toggle("slow")
            console.log("tet");
        })
    </script>
@endpush
