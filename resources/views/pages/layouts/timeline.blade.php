<div class="container">
    <div class="row">
        <div class="col">
            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                <div
                    class="timeline-step

                    {{ Route::is('individu.pekerjaan.create', 'individu.kesehatan.create', 'individu.pendidikan.create') ? 'active-right' : '' }}

                    ">
                    <div class="timeline-content

                    {{ Route::is(
                        'individu.deskripsi.create',
                        'individu.pekerjaan.create',
                        'individu.kesehatan.create',
                        'individu.pendidikan.create',
                    )
                        ? 'active'
                        : '' }}"
                        data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content=""
                        data-original-title="">
                        <div class="inner-circle"></div>
                        <p class="h6 mt-3 mb-1">Step 1</p>
                        <p class="h6 mb-1">Deskripsi Individu</p>
                    </div>
                </div>
                <div
                    class="timeline-step

                {{ Route::is('individu.pekerjaan.create', 'individu.kesehatan.create', 'individu.pendidikan.create') ? 'active-left' : '' }}

                {{ Route::is('individu.kesehatan.create', 'individu.pendidikan.create') ? 'active-right' : '' }}

                ">

                    <div class="timeline-content

                    {{ Route::is('individu.pekerjaan.create', 'individu.kesehatan.create', 'individu.pendidikan.create')
                        ? 'active'
                        : '' }}"
                        data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content=""
                        data-original-title="">
                        <div class="inner-circle"></div>
                        <p class="h6 mt-3 mb-1">Step 2</p>
                        <p class="h6 mb-1">Pekerjaan Individu</p>
                    </div>
                </div>
                <div
                    class="timeline-step

                {{ Route::is('individu.kesehatan.create', 'individu.pendidikan.create') ? 'active-left' : '' }}

                {{ Route::is('individu.pendidikan.create') ? 'active-right' : '' }}

                ">
                    <div class="timeline-content

                    {{ Route::is('individu.kesehatan.create', 'individu.pendidikan.create') ? 'active' : '' }}"
                        data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content=""
                        data-original-title="">
                        <div class="inner-circle"></div>
                        <p class="h6 mt-3 mb-1">Step 3</p>
                        <p class="h6 mb-1">Kesehatan Individu</p>
                    </div>
                </div>
                <div
                    class="timeline-step

                {{ Route::is('individu.pendidikan.create') ? 'active-left' : '' }}
                ">
                    <div class="timeline-content

                    {{ Route::is('individu.pendidikan.create') ? 'active' : '' }}

                    "
                        data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content=""
                        data-original-title="">
                        <div class="inner-circle"></div>
                        <p class="h6 mt-3 mb-1">Step 4</p>
                        <p class="h6 mb-1">Pendidikan Individu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const links = [
        "/individu/create/deskripsi",
        "/individu/create/pekerjaan",
        "/individu/create/kesehatan",
        "/individu/create/pendidikan",
    ]
    document.querySelectorAll(".timeline-step").forEach(element => {
        console.log(element);
    });
</script>
