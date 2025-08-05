<li class="satumomen_slide">
    <div class="container-mobile">
        @include('home-components.partials.frame')
        <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center">
            <div class="w-100 bg-white shadow px-3 py-5" style="border-radius: 40rem 40rem 0 0;">
                <div class="text-center pt-5 mb-3">
                    <div class="editable h4 mb-2 animate__animated animate__fadeInDown animate__slower font-accent"
                        style="font-size: 30px;">Akad Nikah</div>
                    <div
                        class="my-3 d-flex flex-column justify-content-center align-items-center animate__animated animate__zoomIn animate__slower">
                        <div class="editable mb-2" style="font-size: 14.4px;width: 100px;">{{ $invitation->akad_day }}
                        </div>
                        <div style="border-top: 2px solid var(--inv-accent);border-bottom: 2px solid var(--inv-accent);"
                            class="mb-2">
                            <div class="editable font-weight-bold" style="font-size: 60px;line-height: 1;">
                                {{ $invitation->akad_date->format('j') }}</div>
                        </div>
                        <div class="editable" style="font-size: 14.4px;width: 100px;">
                            {{ \Carbon\Carbon::parse($invitation->akad_date)->locale('id')->isoFormat('MMMM YYYY') }}
                        </div>
                    </div>
                    <div class="editable animate__animated animate__fadeInDown animate__slower"
                        style="font-size: 14.4px;">Pukul {{ $invitation->akad_clock }}</div>

                </div>
                <div class="text-center">
                    <div class="editable font-weight-bold animate__animated animate__fadeInUp animate__slower"
                        style="font-size: 14.4px;">{{ $invitation->akad_venue }}</div>
                    <div class="editable mb-4 animate__animated animate__fadeInUp animate__slower"
                        style="font-size: 14.4px;">{{ $invitation->akad_address }}</div><a
                        href="{{ $invitation->akad_maps }}" target="_blank"
                        class="link btn btn-primary rounded-pill animate__animated animate__fadeInUp animate__slower"
                        draggable="false">Link Google Maps</a>
                </div>
            </div>
        </div>
    </div>
</li>
