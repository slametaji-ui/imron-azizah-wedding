<li class="satumomen_slide satumomen_cover">
    <div class="container-mobile cover">
        @include('home-components.partials.frame')
        <div
            class="h-100 w-100 d-flex flex-column justify-content-center align-items-center">
            <div
                class="text-center animate__animated animate__fadeInDown animate__slower font-brittany-signature">
                {{ $invitation->invitation_name }}
            </div>
            <div class="mt-4 animate__animated animate__zoomIn animate__slower image-editable"
                style="height: 222px; width: 160px;border-radius: 10rem 10rem 1rem 1rem; overflow: hidden;">
                <img src="{{ asset('assets/images/galleries/cover.jpg') }}"
                    style="width: 100%;height: 100%;object-fit: cover;"
                    draggable="false">
            </div>
            <div class="mb-5 text-center animate__animated animate__fadeInUp animate__slower font-accent"
                style="font-size: 40px;">{{ $invitation->groom_nickname }} &amp; {{ $invitation->bride_nickname }}</div>
            <div class="text-center">

                <div class="mb-2 editable animate__animated animate__fadeInUp animate__slower"
                    style="font-size: 15px;">Kepada Yth<br>Bapak/Ibu/Saudara/i</div>
                <div id="guestNameSlot"
                    class="editable h5 font-weight-bold mb-2 animate__animated animate__fadeInUp animate__slower"
                    style="font-size: 18px;">
                </div>

                <button type="button"
                    class="btn-open-invitation btn btn-primary rounded-pill mb-4 animate__animated animate__fadeInUp animate__slow"
                    style="font-size: 14px;"><i class="bi bi-envelope-open-heart"></i> Open Invitation</button>
            </div>
        </div>
    </div>
</li>
