<li class="satumomen_slide">
    <div class="container-mobile">
        @include('home-components.partials.frame')
        <div class="bg-white shadow p-3 h-100 w-100 d-flex flex-column justify-content-center align-items-center"
            style="border-radius: 1rem;">
            <div class="title-name editable text-center animate__animated animate__fadeInDown animate__slower font-accent"
                style="font-size: 22px;">السَّلَامُ عَلَيْكُمْ وَرَحْمَةُٱللَّٰهِ وَبَرَكَاتُهُ</div>
            <div class="mb-3 editable text-center animate__animated animate__fadeInDown animate__slower"
                style="font-size: 13px;">Tanpa mengurangi rasa hormat<br>Kami
                bermaksud mengundang Bapak/Ibu/Saudara/i pada acara pernikahan kami
            </div>
            <div class="w-100 d-flex mb-2">
                <div class="image-editable animate__animated animate__fadeInLeft animate__slower"
                    style="height: 130px; width: 130px; margin: auto; border-radius: 100%; overflow: hidden; background-image: url(&quot;../assets/themes/java-blue/mandala.webp&quot;); background-position: center center; background-size: contain; display: flex; justify-content: center; align-items: center; padding: 15px;">
                    <img src="assets/images/galleries/aji.jpg"
                        draggable="false"
                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 100%; margin: auto; border: 4px solid var(--inv-border);">
                </div>
                <div class="image-editable animate__animated animate__fadeInRight animate__slower"
                    style="height: 130px; width: 130px; margin: auto; border-radius: 100%; overflow: hidden; background-image: url(&quot;../assets/themes/java-blue/mandala.webp&quot;); background-position: center center; background-size: contain; display: flex; justify-content: center; align-items: center; padding: 15px;">
                    <img src="assets/images/galleries/diani.jpg"
                        draggable="false"
                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 100%; margin: auto; border: 4px solid var(--inv-border);">
                </div>
            </div>
            <div class="text-center mb-4">
                <div class="laila-bold editable h4 mb-0 animate__animated animate__fadeInUp animate__slower font-latin"
                    style="font-size: 20px;">{{ $invitation->groom_fullname }}</div>
                <div class="editable mb-2 animate__animated animate__fadeInUp animate__slower"
                    style="font-size: 14.4px;">Putra Ke-{{ $invitation->groom_child_number }}<br>dari Bapak {{ $invitation->groom_father_name }}
                    <br>dan Ibu {{ $invitation->groom_mother_name }}
                </div><a href="https://instagram.com/{{ $invitation->groom_instagram }}" target="_blank"
                    rel="nofollow" draggable="false"
                    class="btn btn-sm btn-primary link rounded-pill animate__animated animate__fadeInUp animate__slower"><i class="bi bi-instagram"></i> {{ $invitation->groom_instagram }}</a>
            </div>
            <div class="text-center">
                <div class="laila-bold editable h4 mb-0 animate__animated animate__fadeInUp animate__slower font-latin"
                    style="font-size: 20px;">{{ $invitation->bride_fullname }}</div>
                <div class="editable mb-2 animate__animated animate__fadeInUp animate__slower"
                    style="font-size: 14.4px;">Putri Ke-{{ $invitation->bride_child_number }}<br>dari Bapak {{ $invitation->bride_father_name }}
                    <br>dan Ibu {{ $invitation->bride_mother_name }}
                </div><a href="https://instagram.com/{{ $invitation->bride_instagram }}" target="_blank"
                    rel="nofollow" draggable="false"
                    class="btn btn-sm btn-primary link rounded-pill animate__animated animate__fadeInUp animate__slower"><i class="bi bi-instagram"></i> {{ $invitation->bride_instagram }}</a>
            </div>
        </div>
    </div>
</li>
