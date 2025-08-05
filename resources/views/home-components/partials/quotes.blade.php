<li class="satumomen_slide">
    <div class="container-mobile">
        @include('home-components.partials.frame')
        <div class="d-flex justify-content-center align-items-center flex-column" style="height: 80%;">
            <img src="{{ url('assets/images/icon.png') }}" class="animate__animated animate__fadeInDown animate__slow" alt="Icon" style="height: 100px;">
            <div class="editable h4 color-accent animate__animated animate__fadeInDown animate__slow font-brittany-signature"
                style="font-size: 30px;">Aji &amp; Diani</div>
            <p class="editable font-weight-bold animate__animated animate__fadeInDown animate__slow" style="font-size: 12px;">Sabtu, 21 Juni 2025</p>
            <div style="width: 100%;">
                <div class="text-left bg-white p-4 shadow animate__animated animate__fadeInUp animate__slower" style="border-radius: 1rem;">
                    <div class="mb-3 editable animate__animated animate__fadeIn" style="font-size: 14.4px;">
                        {{ $invitation->quotes_content }}</div>
                    <div class="editable font-weight-bold" style="font-size: 15px;">{{ $invitation->quotes_source }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
