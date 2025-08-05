@php
    $widths = [70, 30, 30, 70, 70, 30]; // Array persentase width
@endphp

<li class="satumomen_slide">
    <div class="container-mobile">
        @include('home-components.partials.frame')
        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
            <div style="width: 100%;">
                <div class="text-center mb-4 animate__animated animate__fadeInDown animate__slower">
                    <div class="color-accent h4 mb-2 editable font-latin" style="font-size: 28.8px;">Our Memories</div>
                </div>
                <div class="image-editable d-flex flex-wrap" style="margin: -4px;">
                    @foreach($galleries as $index => $image)
                        @php
                            $width = $widths[$index % count($widths)]; // Mendapatkan width berdasarkan indeks
                        @endphp
                        <div class="animate__animated animate__zoomIn animate__slower"
                            style="width: {{ $width }}%; overflow: hidden; padding: 4px;">
                            <div class="light" style="overflow: hidden; width: 100%; height: 144px;">
                                <img src="{{ asset('storage/' . $image->image_path) }}" draggable="false"
                                    class="lightbox" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</li>
