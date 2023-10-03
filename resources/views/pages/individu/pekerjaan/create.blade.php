@extends('pages.layouts.create')

@section('timeline')
    @include('pages.layouts.timeline', ['operation' => 'create'])
@endsection

@section('form_field')
    {{-- kondisi pekerjaan --}}
    <div class="form-group">
        <label>Kondisi Pekerjaan</label>
        <select class="form-control @error('kondisi_pekerjaan') is-invalid @enderror" name="kondisi_pekerjaan">
            <option value="" selected>Pilih Kondisi Pekerjaan</option>
            @foreach ($dataKondisiPekerjaan as $kondisiPekerjaan)
                <option value="{{ $kondisiPekerjaan->id }}" @selected(old('kondisi_pekerjaan') == $kondisiPekerjaan->id)>{{ $kondisiPekerjaan->nama }}
                </option>
            @endforeach
        </select>
        @error('kondisi_pekerjaan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Pekerjaan Utama --}}
    <div class="form-group">
        <label>Pekerjaan Utama</label>
        <select class="form-control @error('pekerjaan_utama') is-invalid @enderror" name="pekerjaan_utama"
            id="selectPekerjaanUtama" @if (old('checkbox_pekerjaan_utama_lainnya') == 'true') disabled="true" @endif>
            <option value="" selected>Pilih Pekerjaan Utama</option>
            @foreach ($dataPekerjaanUtama as $pekerjaanUtama)
                <option value="{{ $pekerjaanUtama->id }}" @selected(old('pekerjaan_utama') == $pekerjaanUtama->id)>{{ $pekerjaanUtama->nama }}
                </option>
            @endforeach
        </select>
        @error('pekerjaan_utama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkboxPekerjaanUtamaLainnya"
                    name="checkbox_pekerjaan_utama_lainnya" value="true" @checked(old('checkbox_pekerjaan_utama_lainnya') == 'true')>
                <label class="custom-control-label" for="checkboxPekerjaanUtamaLainnya">Pekerjaan Utama Lainnya</label>
            </div>
            <input type="text" id="inputPekerjaanUtamaLainnya"
                class="form-control mt-1 @error('pekerjaan_utama_lainnya') is-invalid @enderror"
                name="pekerjaan_utama_lainnya" value="{{ old('pekerjaan_utama_lainnya') }}"
                @if (old('checkbox_pekerjaan_utama_lainnya') != 'true') disabled="true" @endif>
            @error('pekerjaan_utama_lainnya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Status Jamsostek --}}
    <div class="form-group">
        <label>Status Jamsostek</label>
        <select class="form-control @error('status_jamsostek') is-invalid @enderror" name="status_jamsostek">
            <option value="" selected>Pilih Status Jamsostek</option>
            <option value="peserta" @selected(old('status_jamsostek') == 'peserta')>Peserta</option>
            <option value="bukan peserta" @selected(old('status_jamsostek') == 'bukan peserta')>Bukan Peserta</option>
        </select>
        @error('status_jamsostek')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- no jamsostek --}}
    <div class="form-group">
        <label>Nomor Peserta Jamsostek</label>
        <input type="text" class="form-control @error('no_jamsostek') is-invalid @enderror" name="no_jamsostek"
            value="{{ old('no_jamsostek') }}">
        @error('no_jamsostek')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- gaji --}}
    <div class="form-group">
        <label>Penghasilan Setahun Terakhir</label>
        <input type="text" class="form-control @error('gaji') is-invalid @enderror" name="gaji"
            value="{{ old('gaji') }}">
        @error('gaji')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- penghasilan --}}
    <div class="form-group">
        <label class="mb-2">Penghasilan</label>
        <div class="form-group mt-2">
            <div class="btn btn-primary d-block w-100" role="button" id="show-sumber-penghasilan">Tampilkan Sumber
                Penghasilan</div>
        </div>
        <div id="accordion" style="display:none;">
            @foreach ($dataSumberPenghasilan as $sumberPenghasilan)
                <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse"
                        data-target="#panel-body-{{ $sumberPenghasilan->id }}" aria-expanded="false"
                        data-sumber-penghasilan=1>
                        <h4 class="accordion-title">{{ $sumberPenghasilan->nama }}</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-{{ $sumberPenghasilan->id }}"
                        data-parent="#accordion">
                        {{-- jumlah --}}
                        <div class="form-group">
                            <label>Jumlah</label>
                            <div
                                class="input-group @error('sumber_penghasilan.' . $sumberPenghasilan->id . '.jumlah') is-invalid @enderror">
                                <input type="text"
                                    class="form-control @error('sumber_penghasilan.' . $sumberPenghasilan->id . '.jumlah') is-invalid @enderror"
                                    name="sumber_penghasilan[{{ $sumberPenghasilan->id }}][jumlah]"
                                    value="{{ old('sumber_penghasilan.' . $sumberPenghasilan->id . '.jumlah') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ $sumberPenghasilan->satuan->nama }}</span>
                                </div>
                            </div>

                            @error('sumber_penghasilan.' . $sumberPenghasilan->id . '.jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- penghasilan --}}
                        <div class="form-group">
                            <label>Penghasilan</label>
                            <input type="text"
                                class="form-control @error('sumber_penghasilan.' . $sumberPenghasilan->id . '.penghasilan') is-invalid @enderror"
                                name="sumber_penghasilan[{{ $sumberPenghasilan->id }}][penghasilan]"
                                value="{{ old('sumber_penghasilan.' . $sumberPenghasilan->id . '.penghasilan') }}">
                            @error('sumber_penghasilan.' . $sumberPenghasilan->id . '.penghasilan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- ekspor --}}
                        <div class="form-group">
                            <label>Ekspor</label>
                            <select
                                class="form-control @error('sumber_penghasilan.' . $sumberPenghasilan->id . '.ekspor') is-invalid @enderror"
                                name="sumber_penghasilan[{{ $sumberPenghasilan->id }}][ekspor]">
                                <option value="" selected>Pilih Ekspor</option>

                                <option value="semua" @selected(old('sumber_penghasilan.' . $sumberPenghasilan->id . '.ekspor') == 'semua')>Semua</option>

                                <option value="sebagian besar" @selected(old('sumber_penghasilan.' . $sumberPenghasilan->id . '.ekspor') == 'sebagian besar')>Sebagian Besar</option>

                                <option value="tidak" @selected(old('sumber_penghasilan.' . $sumberPenghasilan->id . '.ekspor') == 'tidak')>Tidak</option>
                            </select>
                            @error('sumber_penghasilan.' . $sumberPenghasilan->id . '.ekspor')
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
        const inputPekerjaanUtamaLainnya = document.querySelector("#inputPekerjaanUtamaLainnya")
        const selectPekerjaanUtama = document.querySelector("#selectPekerjaanUtama")
        document.querySelector("#checkboxPekerjaanUtamaLainnya").addEventListener("click", function() {
            if (inputPekerjaanUtamaLainnya.hasAttribute("disabled")) {
                inputPekerjaanUtamaLainnya.removeAttribute("disabled")
                selectPekerjaanUtama.setAttribute("disabled", true)
            } else {
                inputPekerjaanUtamaLainnya.setAttribute("disabled", true)
                selectPekerjaanUtama.removeAttribute("disabled")
            }
        })

        $("#show-sumber-penghasilan").click(function() {
            $("#accordion").toggle("slow")
            console.log("tet");
        })

        // $("#tambah-sumber-penghasilan").click(function() {
        //     const newSumberPenghasilan = $(".accordion:last").clone()
        //     const nomor = $(newSumberPenghasilan).find(".accordion-header").attr("data-sumber-penghasilan")
        //     $(newSumberPenghasilan).find(".accordion-header")
        //         .attr("data-sumber-penghasilan", Number(nomor) + 1)
        //         .attr("data-target", "#panel-body-" + (Number(nomor) + 1))
        //         .find(".accordion-title").text("Sumber Penghasilan " + (Number(nomor) + 1))
        //     $(newSumberPenghasilan).find(".accordion-body").attr("id", "panel-body-" + (Number(nomor) + 1))
        //     $(newSumberPenghasilan).insertAfter(".accordion:last")
        // })
    </script>
@endpush
