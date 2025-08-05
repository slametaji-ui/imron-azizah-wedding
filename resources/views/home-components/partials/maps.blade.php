<li class="satumomen_slide">
    <div class="container-mobile">
        @include('home-components.partials.frame')
        <div class="d-flex justify-content-center align-items-center"
            style="height: 100%;">
            <div style="width: 100%;">
                <div>
                    <div style=" width: 100%; margin: auto; border-radius: 10px; overflow: hidden; margin-bottom: 20px; padding-bottom: 100%; position: relative;"                                                         class="animate__animated animate__fadeInDown animate__slow">
                        <iframe width="100%" height="100%"
                            style="border:0;position: absolute;" loading="lazy"
                            allowfullscreen=""
                            src="{{ $invitation->maps_iframe }}"
                            class="maps-embed">
                        </iframe>

                    </div>
                    <div
                        class="text-center animate__animated animate__fadeInUp animate__slow">

                        <div class="editable font-weight-bold"
                            style="font-size: 14.4px;">{{ $invitation->akad_venue }}</div>
                        <div class="editable mb-3" style="font-size: 14.4px;">{{ $invitation->akad_address }}</div><a
                            href="{{$invitation->akad_maps }}"
                            class="btn-maps-link btn btn-primary rounded-pill mb-4 animate__animated animate__fadeInUp animate__slow"
                            target="_blank" draggable="false"
                            style="font-size: 14px;">Buka Google Maps</a>
                    </div>



                </div>
            </div>
        </div>
    </div>
</li>
