@if ($operation == 'create')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                    <div
                        class="timeline-step

                    {{ Route::is('keluarga.permukiman.create', 'keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-right' : '' }}

                    ">
                        <div class="timeline-content

                    {{ Route::is(
                        'keluarga.deskripsi.create',
                        'keluarga.permukiman.create',
                        'keluarga.pendidikan.create',
                        'keluarga.kesehatan.create',
                        'keluarga.enumerator.create',
                    )
                        ? 'active'
                        : '' }}"
                            data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content=""
                            data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 1</p>
                            <p class="h6 mb-1">Deskripsi Keluarga</p>
                        </div>
                    </div>

                    <div
                        class="timeline-step

                {{ Route::is('keluarga.permukiman.create', 'keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-left' : '' }}

                {{ Route::is('keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-right' : '' }}

                ">

                        <div class="timeline-content

                    {{ Route::is(
                        'keluarga.permukiman.create',
                        'keluarga.pendidikan.create',
                        'keluarga.kesehatan.create',
                        'keluarga.enumerator.create',
                    )
                        ? 'active'
                        : '' }}"
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 2</p>
                            <p class="h6 mb-1">Permukiman Keluarga</p>
                        </div>
                    </div>

                    <div
                        class="timeline-step

                {{ Route::is('keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-left' : '' }}

                {{ Route::is('keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-right' : '' }}

                ">
                        <div class="timeline-content

                    {{ Route::is('keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active' : '' }}"
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 3</p>
                            <p class="h6 mb-1">Pendidikan Keluarga</p>
                        </div>
                    </div>

                    <div
                        class="timeline-step

                {{ Route::is('keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-left' : '' }}
                {{ Route::is('keluarga.enumerator.create') ? 'active-right' : '' }}
                ">
                        <div class="timeline-content

                    {{ Route::is('keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active' : '' }}

                    "
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 4</p>
                            <p class="h6 mb-1">Kesehatan Keluarga</p>
                        </div>
                    </div>

                    <div
                        class="timeline-step

                {{ Route::is('keluarga.enumerator.create') ? 'active-left' : '' }}
                ">
                        <div class="timeline-content

                    {{ Route::is('keluarga.enumerator.create') ? 'active' : '' }}

                    "
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 5</p>
                            <p class="h6 mb-1">Enumerator Keluarga</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($operation == 'edit')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                    <div
                        class="timeline-step

                {{ Route::is('keluarga.permukiman.create', 'keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-right' : '' }}

                ">
                        <div class="timeline-content

                {{ Route::is(
                    'keluarga.deskripsi.create',
                    'keluarga.permukiman.create',
                    'keluarga.pendidikan.create',
                    'keluarga.kesehatan.create',
                    'keluarga.enumerator.create',
                )
                    ? 'active'
                    : '' }}"
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 1</p>
                            <p class="h6 mb-1">Deskripsi Keluarga</p>
                        </div>
                    </div>

                    <div
                        class="timeline-step

            {{ Route::is('keluarga.permukiman.create', 'keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-left' : '' }}

            {{ Route::is('keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-right' : '' }}

            ">

                        <div class="timeline-content

                {{ Route::is(
                    'keluarga.permukiman.create',
                    'keluarga.pendidikan.create',
                    'keluarga.kesehatan.create',
                    'keluarga.enumerator.create',
                )
                    ? 'active'
                    : '' }}"
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 2</p>
                            <p class="h6 mb-1">Permukiman Keluarga</p>
                        </div>
                    </div>

                    <div
                        class="timeline-step

            {{ Route::is('keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-left' : '' }}

            {{ Route::is('keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-right' : '' }}

            ">
                        <div class="timeline-content

                {{ Route::is('keluarga.pendidikan.create', 'keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active' : '' }}"
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 3</p>
                            <p class="h6 mb-1">Pendidikan Keluarga</p>
                        </div>
                    </div>

                    <div
                        class="timeline-step

            {{ Route::is('keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active-left' : '' }}
            {{ Route::is('keluarga.enumerator.create') ? 'active-right' : '' }}
            ">
                        <div class="timeline-content

                {{ Route::is('keluarga.kesehatan.create', 'keluarga.enumerator.create') ? 'active' : '' }}

                "
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 4</p>
                            <p class="h6 mb-1">Kesehatan Keluarga</p>
                        </div>
                    </div>

                    <div
                        class="timeline-step

            {{ Route::is('keluarga.enumerator.create') ? 'active-left' : '' }}
            ">
                        <div class="timeline-content

                {{ Route::is('keluarga.enumerator.create') ? 'active' : '' }}

                "
                            data-toggle="popover" data-trigger="hover" data-placement="top" title=""
                            data-content="" data-original-title="">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">Step 5</p>
                            <p class="h6 mb-1">Enumerator Keluarga</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const id = window.location.pathname.split('/')[2]
        const links = [
            `/keluarga/${id}/edit/deskripsi`,
            `/keluarga/${id}/edit/permukiman`,
            `/keluarga/${id}/edit/pendidikan`,
            `/keluarga/${id}/edit/kesehatan`,
            `/keluarga/${id}/edit/enumerator`,
        ]
        document.querySelectorAll(".timeline-step").forEach((element, index) => {
            element.href = links[index]
        });
    </script>
@endif
