<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} Wedding</title>
    <link rel="shortcut icon" href="{{ url('assets/clone/img/n.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('assets/clone/style.css') }}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'playfair': ['Netflix Sans', 'serif'],
                        'sans': ['Netflix Sans', 'sans-serif']
                    },
                    colors: {
                        'primary': '#E50914',
                        /* Netflix Red */
                        'secondary': '#141414',
                        /* Dark background */
                        'dark': '#000000',
                        /* Black */
                        'light': '#e5e5e5' /* Light gray for text */
                    }
                }
            }
        }
    </script>
    <style>
        #coverInvitation {
            overflow: hidden;
        }

        .allow-scroll {
            overflow: auto;
        }

        #coverInvitation {
            transition: opacity 0.5s ease-out;
            /* Transisi halus ketika menyembunyikan section */
        }

        .hidden {
            opacity: 0;
            pointer-events: none;
            /* Nonaktifkan interaksi ketika section disembunyikan */
        }

        .show {
            display: block;
            /* Menampilkan hero section ketika diperlukan */
        }
    </style>
    <link rel="stylesheet" href="{{ url('assets/clone/css/zoom.css') }}">
</head>

<body class="font-sans">

    <!--  Cover Invitation -->
    <section id="coverInvitation" class="relative h-screen flex items-center justify-center bg-cover bg-center">
        <div class="container mx-auto px-4 text-center">
            <img src="{{ url('assets/clone/img/logo.png') }}" alt="" style="height: 8rem;"class="mx-auto mb-4">
            <h2 class="font-bold mb-12">Who's watching?</h2>
            <div class="flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-12">
                <div class="text-center">
                    <img src="{{ url('assets/clone/img/guest.webp') }}" alt=""
                        style="height: 8rem;"class="mx-auto mb-4">
                    <p class="text-xl font-semibold">{{ request()->query('to') }}</p>
                </div>
            </div>
            <div class="mt-8">
                <button id="openInvitation" class="bt-primary">
                    OPEN INVITATION
                </button>
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section id="heroSection" class="welcome relative h-screen flex items-end justify-start bg-cover bg-center"
        style="background-image: url('assets/clone/img/DTS08505.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="absolute inset-x-0 bottom-0 h-96 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        <div class="relative z-10 text-left text-white px-4 pb-40 pl-10">
            {{-- <img src="{{ url('assets/clone/img/logo.png') }}" alt="" style="height: 4rem;" class="mb-4"> --}}
             <div class="flex">
                    <img src="{{ url('assets/clone/img/n.png') }}" alt="" style="height: 1rem;" class="mb-4">
                    <small class="text-l font-playfair ml-2 mb-2">D O C U M E N T E R</small>
                </div>
            <h1 class="text-4xl md:text-6xl font-playfair font-bold">{{ $invitation->groom_nickname }} &
                {{ $invitation->bride_nickname }}:</h1>
            <p class="text-4xl md:text-6xl font-playfair font-bold mb-2">Sebelum Hari H</p>
            <div class="flex flex-wrap justify-start align-center gap-2">
                <span class="text-sm bg-red-500 px-3 p-1 rounded-full">Coming Soon</span>
                <p class="text-lg">14 Agustus 2025</p>
            </div>
            <div class="mt-8 flex flex-wrap justify-start gap-2">
                <span class="text-sm bg-gray-400 bg-opacity-50 px-3 py-1 rounded-full">#getmarried</span>
                <span class="text-sm bg-gray-400 bg-opacity-50 px-3 py-1 rounded-full">#romantic</span>
                <span class="text-sm bg-gray-400 bg-opacity-50 px-3 py-1 rounded-full">#lovestory</span>
                <span class="text-sm bg-gray-400 bg-opacity-50 px-3 py-1 rounded-full">#documenter</span>
            </div>
        </div>
    </section>

    <!-- Coming Soon Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-start">
                <img src="{{ url('assets/clone/img/DTS08393.jpg') }}" alt=""
                    class="rounded-xl w-full h-auto mb-6 object-cover object-center">
                <div class="flex">
                    <img src="{{ url('assets/clone/img/n.png') }}" alt="" style="height: 1rem;" class="mb-4">
                    <small class="text-l font-playfair ml-2 mb-2">D O C U M E N T E R</small>
                </div>
                <p class="text-2xl font-playfair font-bold mb-4">Imron & Azizah: Sebelum Hari H</p>
                <div class="flex align-items-center align-middle space-x-4 mb-6">
                    <p class="text-green-600 mb-6">100% match</p>
                    <span class="bg-gray-400 rounded w-8 h-8 flex items-center justify-center"><b>SU</b></span>
                    <div class="border-2 border-solid w-8 h-8 flex items-center justify-center">
                        <span class="text-xs">4K</span>
                    </div>
                    <div class="border-2 border-solid w-8 h-8 flex items-center justify-center">
                        <span class="text-xs">HD</span>
                    </div>
                </div>
                <div class="text-white-100 bg-primary p-2 rounded-xl">
                    <p class="text-sm">Coming soon on {{ \Carbon\Carbon::parse($invitation->akad_date)->locale('id')->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <section class="py-16 bg-pink-50">
        <div class="container mx-auto px-4 max-w-3xl text-center">
            <p class="text-lg italic mb-6">{{ $invitation->quotes_content }}</p>
            <b>{{ $invitation->quotes_source }}</b>
        </div>
    </section>

    <!-- Breaking News Section -->
    <section class="py-16">
        <div class="container mx-auto px-4 max-w-3xl">
            <h2 class="text-3xl font-playfair font-bold text-center mb-12">Breaking News</h2>
            <div class="bg-white rounded-xl shadow-lg p-8">

                <img src="{{ url('assets/clone/img/DTS08444.jpg') }}" alt=""
                    class="rounded-xl w-full h-64 mb-6 object-cover object-center">
                <p class="mb-4">Hai semuanya! Ada kabar gembira nih, kita mau ngabarin kalau kita bakal segera
                    menikah!</p>
                <p class="mb-4">insyaAllah dilaksanakan di Pondok Cabe.</p>
                <p class="mb-4">Doain ya supaya semuanya lancar dan kita bisa segera membangun rumah tangga yang
                    bahagia. Makasih banyak atas doa dan dukungannya!</p>
                <p class="font-semibold">Best regards,<br>{{ $invitation->bride_nickname }} and
                    {{ $invitation->groom_nickname }}</p>
            </div>
        </div>
    </section>

    <!-- Bride & Groom Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-playfair font-bold text-center mb-12">Bride & Groom</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-5xl mx-auto">
                <!-- Groom -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{ url('assets/clone/img/imron.jpg') }}" alt=""
                        class="rounded-full w-48 h-48 flex mb-4 items-center justify-center">
                    <h3 class="text-2xl font-playfair font-bold mb-2">{{ $invitation->groom_fullname }}</h3>
                    <p class="text-gray-600 mb-4">Putra dari Bapak {{ $invitation->groom_father_name }} dan Ibu
                        {{ $invitation->groom_mother_name }}</p>
                </div>
                <!-- Bride -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{ url('assets/clone/img/azizah.jpg') }}" alt=""
                        class="rounded-full w-48 h-48 flex mb-4 items-center justify-center">
                    <h3 class="text-2xl font-playfair font-bold mb-2">{{ $invitation->bride_fullname }}</h3>
                    <p class="text-gray-600 mb-4">Putri dari Bapak {{ $invitation->bride_father_name }} dan Ibu
                        {{ $invitation->bride_mother_name }}</p>
                </div>
            </div>
    </section>

    <!-- Timeline & Location Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-playfair font-bold text-center mb-12">Timeline & Location</h2>
            <div class="max-w-4xl mx-auto">
                <!-- Akad Nikah -->
                <div class="flex flex-col md:flex-row items-center mb-16">
                    <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                        < <img src="{{ url('assets/clone/img/DTS08426.jpg') }}" alt="Akad Nikah"
                            class="rounded-lg w-96 lg:h-48 sm:w-48 sm:h-48 flex object-cover object-center">
                    </div>
                    <div class="md:w-2/3 md:pl-8 text-center md:text-left">
                        <h3 class="text-2xl font-playfair font-bold">Akad Nikah</h3>
                        <p class="text-xl text-primary">
                            {{ \Carbon\Carbon::parse($invitation->akad_date)->locale('id')->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="text-lg">{{ $invitation->akad_clock }}</p>
                        <p class="">{{ $invitation->akad_venue . ' - ' . $invitation->akad_address }}</p>
                        <a href="{{ $invitation->akad_maps }}" target="_blank"
                            class="inline-block text-primary rounded-full hover:text-pink-700 transition duration-300">
                            Buka Google Maps >>
                        </a>
                    </div>
                </div>

                <!-- Resepsi -->
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                        <img src="{{ url('assets/clone/img/DTS08404.jpg') }}" alt="Resepsi"
                            class="rounded-lg w-96 lg:h-48 sm:w-48 sm:h-48 flex object-cover">
                    </div>
                    <div class="md:w-2/3 md:pl-8 text-center md:text-left">
                        <h3 class="text-2xl font-playfair font-bold">Resepsi</h3>
                        <p class="text-xl text-primary">
                            {{ \Carbon\Carbon::parse($invitation->resepsi_date)->locale('id')->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="text-lg">{{ $invitation->resepsi_clock }}</p>
                        <p class=>{{ $invitation->resepsi_venue . ' - ' . $invitation->resepsi_address }}</p>
                        <a href="{{ $invitation->resepsi_maps }}" target="_blank"
                            class="inline-block text-primary rounded-full hover:text-pink-700 transition duration-300">
                            Buka Google Maps >>
                        </a>
                    </div>
                </div>

                <!-- RSVP Modal -->
                <div id="rsvpModal"
                    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                    <div class="bg-white p-8 rounded-lg w-full sm:w-1/2">
                        <h2 class="text-2xl font-semibold mb-4">Konfirmasi Kehadiran</h2>

                        <!-- Nama Pengunjung yang tidak bisa diedit, diambil dari parameter 'to' -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium">Nama Anda</label>
                            <input type="text" id="namaPengunjung" value="{{ request()->query('to') }}"
                                class="w-full px-4 py-2 border rounded-md bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary"
                                readonly>
                        </div>

                        <!-- Konfirmasi Kehadiran -->
                        <div class="mb-4">
                            <label for="konfirmasiKehadiran" class="block text-sm font-medium">Apakah Anda akan
                                hadir?</label>
                            <select id="konfirmasiKehadiran"
                                class="w-full px-4 py-2 border rounded-md bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                                <option value="hadir">Hadir</option>
                                <option value="tidak_hadir">Tidak Hadir</option>
                            </select>
                        </div>

                        <!-- Form Ucapan -->
                        <div class="mb-4">
                            <label for="ucapan" class="block text-sm font-medium">Ucapan Anda</label>
                            <textarea id="ucapan"
                                class="w-full px-4 py-2 border rounded-md bg-white text-black focus:outline-none focus:ring-2 focus:ring-primary"
                                placeholder="Masukkan ucapan" required></textarea>
                        </div>

                        <!-- Button Kirim -->
                        <div class="text-center">
                            <button type="submit" id="submitRsvpForm"
                                class="bg-primary text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-pink-700 transition duration-300">
                                Kirim Konfirmasi
                            </button>
                        </div>

                        <!-- Daftar Pesan yang Sudah Masuk -->
                        <div id="daftarPesan" class="mt-6">
                            <h3 class="text-lg font-semibold">Pesan yang Sudah Masuk:</h3>
                            <div id="pesanList" class="mt-2 max-h-40 overflow-y-auto">
                                <!-- Daftar pesan akan tampil di sini -->
                            </div>
                        </div>

                        <button id="closeModal" class="absolute top-2 right-2 text-xl text-gray-500">&times;</button>
                    </div>
                </div>

                <!-- RSVP Button -->
                <div class="text-center mt-16">
                    <button id="openModal"
                        class="bg-primary text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-pink-700 transition duration-300">
                        KONFIRMASI KEHADIRAN
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- Our Love Story Section -->
    {{-- <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-playfair font-bold text-center mb-12">Our Love Story</h2>
            <div class="max-w-4xl mx-auto">
                <!-- Story 1 -->
                <div class="flex flex-col md:flex-row items-center mb-16">
                    <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                        <div
                            class="bg-gray-200 border-2 border-dashed rounded-lg w-48 h-48 flex items-center justify-center">
                            <span class="text-gray-500">Story 1</span>
                        </div>
                    </div>
                    <div class="md:w-2/3 md:pl-8 text-center md:text-left">
                        <h3 class="text-2xl font-playfair font-bold mb-2">Episode 1: Pertemuan Tak Terduga di Ruang
                            Kopi</h3>
                        <p class="text-primary mb-4">2021</p>
                        <p>Secangkir kopi menjadi saksi bisik hati saat mereka pertama kali bertemu di mesin kopi
                            kantor. Obrolan ringan yang tak terduga membuka lembaran baru kisah cinta mereka.</p>
                    </div>
                </div>

                <!-- Story 2 -->
                <div class="flex flex-col md:flex-row items-center mb-16">
                    <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                        <div
                            class="bg-gray-200 border-2 border-dashed rounded-lg w-48 h-48 flex items-center justify-center">
                            <span class="text-gray-500">Story 2</span>
                        </div>
                    </div>
                    <div class="md:w-2/3 md:pl-8 text-center md:text-left">
                        <h3 class="text-2xl font-playfair font-bold mb-2">Episode 2: Kejutan di Hari Ulang Tahun</h3>
                        <p class="text-primary mb-4">2022</p>
                        <p>Di tengah kesibukan kantor, dia memberikan kejutan manis di hari ulang tahunnya. Sebuah buket
                            bunga dan kartu ucapan sederhana membuat hatinya berbunga-bunga.</p>
                    </div>
                </div>

                <!-- Story 3 -->
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                        <div
                            class="bg-gray-200 border-2 border-dashed rounded-lg w-48 h-48 flex items-center justify-center">
                            <span class="text-gray-500">Story 3</span>
                        </div>
                    </div>
                    <div class="md:w-2/3 md:pl-8 text-center md:text-left">
                        <h3 class="text-2xl font-playfair font-bold mb-2">Episode 3: Janji Sehidup Semati</h3>
                        <p class="text-primary mb-4">2023</p>
                        <p>Dengan latar belakang pantai yang indah, dia melamarnya. Di bawah langit penuh bintang,
                            mereka mengucapkan janji suci untuk bersama selamanya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Gallery Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-playfair font-bold text-center mb-12">Our Memories</h2>
            <div class="img grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 max-w-6xl mx-auto">
                <img src="{{ url('/assets/clone/img/DTS08323.jpg') }}"
                    src2="{{ url('/assets/clone/img/DTS08323.jpg') }}" zoombox
                    class="rounded-lg w-full h-48 object-cover">
                <img src="{{ url('/assets/clone/img/DTS08334.jpg') }}"
                    src2="{{ url('/assets/clone/img/DTS08334.jpg') }}" zoombox
                    class="rounded-lg w-full h-48 object-cover">
                <img src="{{ url('/assets/clone/img/DTS08444.jpg') }}"
                    src2="{{ url('/assets/clone/img/DTS08444.jpg') }}" zoombox
                    class="rounded-lg w-full h-48 object-cover">
                <img src="{{ url('/assets/clone/img/GEDE.jpg') }}" src2="{{ url('/assets/clone/img/GEDE.jpg') }}"
                    zoombox class="rounded-lg w-full h-48 object-cover">
                <img src="{{ url('/assets/clone/img/DTS08350.jpg') }}"
                    src2="{{ url('/assets/clone/img/DTS08350.jpg') }}" zoombox
                    class="rounded-lg w-full h-48 object-cover">
                <img src="{{ url('/assets/clone/img/DTS08404.jpg') }}"
                    src2="{{ url('/assets/clone/img/DTS08404.jpg') }}" zoombox
                    class="rounded-lg w-full h-48 object-cover">
            </div>
        </div>
    </section>


    <section class="py-16 bg-pink-50">
        <div class="container mx-auto px-4 text-center">


            <!-- Gift Section -->
            <div class="mt-12">
                <h3 class="text-2xl font-playfair font-bold mb-6">🎁 Tanda Kasih</h3>
                <p class="text-lg mb-4">Untuk Keluarga dan Sahabat yang ingin memberikan kegembiraan melalui hadiah
                    untuk pernikahan kami silakan kirim melalui informasi berikut:</p>

                <div class="flex justify-center mb-6">
                    <label
                        class="inline-flex items-center text-xl font-medium mr-6 bg-red-500 text-white px-4 py-2 rounded-full">
                        <input type="radio" name="gift_type" value="cash" class="gift-radio" />
                        <span class="ml-2">🏧 Dompet Digital</span>
                    </label>
                </div>

                <!-- Cash Section -->
                <div id="cashSection" class="gift-section hidden">
                    <h4 class="text-xl font-semibold mb-4">Bank Account Details</h4>
                    <p class="text-lg mb-4">Please find the bank account details for your cash gift below:</p>

                    <!-- Bank Information with Logos -->
                    <div class="space-y-6">
                        <!-- Bank Mandiri -->
                        <div class="flex items-center justify-between bg-gray-800 p-4 rounded-lg shadow-md">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg"
                                    alt="Mandiri Logo" class="w-24 h-auto mr-4 bg-slate-200 px-2 py-5 rounded" />
                                <div class="text-left">
                                    <p class="text-lg font-medium">Bank Mandiri</p>
                                    <p class="text-lg">1640005497039</p>
                                    <p class="text-lg">M IMRON</p>
                                </div>
                            </div>
                            <button class="copy-btn bg-gray-400 py-1 px-2 rounded-full text-sm"
                                onclick="copyToClipboard('mandiri')">Copy</button>
                        </div>

                        <!-- Bank BCA (First Account) -->
                        <div class="flex items-center justify-between bg-gray-800 p-4 rounded-lg shadow-md">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/640px-Bank_Central_Asia.svg.png"
                                    alt="BCA Logo" class="w-24 h-auto mr-4 bg-slate-200 px-2 py-5 rounded" />
                                <div class="text-left">
                                    <p class="text-lg font-medium">BCA</p>
                                    <p class="text-lg">8010356513</p>
                                    <p class="text-lg">M. IMRON</p>
                                </div>
                            </div>
                            <button class="copy-btn bg-gray-400 py-1 px-2 rounded-full text-sm"
                                onclick="copyToClipboard('bca1')">Copy</button>
                        </div>

                        <!-- Bank BCA (Second Account) -->
                        <div class="flex items-center justify-between bg-gray-800 p-4 rounded-lg shadow-md">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/640px-Bank_Central_Asia.svg.png"
                                    alt="BCA Logo" class="w-24 h-auto mr-4 bg-slate-200 px-2 py-5 rounded" />
                                <div class="text-left">
                                    <p class="text-lg font-medium">BCA</p>
                                    <p class="text-lg">0930014061</p>
                                    <p class="text-lg">Azizah Eka Cahyati</p>
                                </div>
                            </div>
                            <button class="copy-btn bg-gray-400 py-1 px-2 rounded-full text-sm"
                                onclick="copyToClipboard('bca2')">Copy</button>
                        </div>

                        <!-- Bank BRI -->
                        <div class="flex items-center justify-between bg-gray-800 p-4 rounded-lg shadow-md">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg"
                                    alt="BRI Logo" class="w-24 h-auto mr-4 bg-slate-200 px-2 py-5 rounded" />
                                <div class="text-left">
                                    <p class="text-lg font-medium">BRI</p>
                                    <p class="text-lg">117301010510502</p>
                                    <p class="text-lg">M. Imron</p>
                                </div>
                            </div>
                            <button class="copy-btn bg-gray-400 py-1 px-2 rounded-full text-sm"
                                onclick="copyToClipboard('bri')">Copy</button>
                        </div>

                        <!-- Dana -->
                        <div class="flex items-center justify-between bg-gray-800 p-4 rounded-lg shadow-md">
                            <div class="flex items-center">
                                <img src="https://i.scdn.co/image/ab671c3d0000f430e41a9f2d582f0887e21d1266"
                                    alt="Dana Logo" class="w-24 h-auto mr-4 bg-slate-200 px-2 py-5 rounded" />
                                <div class="text-left">
                                    <p class="text-lg font-medium">Dana</p>
                                    <p class="text-lg">082122602721</p>
                                </div>
                            </div>
                            <button class="copy-btn bg-gray-400 py-1 px-2 rounded-full text-sm"
                                onclick="copyToClipboard('dana')">Copy</button>
                        </div>
                    </div>
                </div>

            </div>

            <p class="text-lg mb-6 mt-6">Merupakan kehormatan & kebahagiaan bagi kami
                apabila Bapak/Ibu/Saudara/i dapat berhadir
                dan memberikan doa restu kepada kami.</p>
            <p class="text-2xl font-playfair font-bold mb-8">Kami yang berbahagia,</p>
            <p class="text-3xl font-playfair font-bold mb-8">{{ $invitation->groom_nickname }} &
                {{ $invitation->bride_nickname }}</p>
        </div>
    </section>

    <script>
        // Handle radio button changes to show the correct section
        document.querySelectorAll('.gift-radio').forEach((radio) => {
            radio.addEventListener('change', (event) => {
                if (event.target.value === 'cash') {
                    document.getElementById('cashSection').classList.remove('hidden');
                    document.getElementById('presentSection').classList.add('hidden');
                } else if (event.target.value === 'present') {
                    document.getElementById('presentSection').classList.remove('hidden');
                    document.getElementById('cashSection').classList.add('hidden');
                }
            });
        });

        // Copy to clipboard function
        function copyToClipboard(type) {
            let textToCopy;
            if (type === 'mandiri') {
                textToCopy = `1640005497039`;
            } else if (type === 'bca1') {
                textToCopy = `8010356513`;
            } else if (type === 'bca2') {
                textToCopy = `0930014061`;
            } else if (type === 'bri') {
                textToCopy = `117301010510502`;
            } else if (type === 'dana') {
                textToCopy = `082122602721`;
            } else if (type === 'address') {
                textToCopy = 'Address: 123 Wedding St, Jakarta, Indonesia';
            }

            // Create a temporary input element to copy text
            const tempInput = document.createElement('input');
            tempInput.value = textToCopy;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Show confirmation
            alert('Details copied to clipboard!');
        }
    </script>

    <section class="py-8 bg-white border-t">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div>
                    <h3 class="font-semibold">Music:</h3>
                    <p>"Separuhku (Nano)"</p>
                </div>
            </div>
        </div>
    </section>

    <audio id="music" loop="" autoplay="">
        <source src="{{ url('/assets/clone/lagu.mp3') }}" type="audio/mpeg">
    </audio>
    <!-- JavaScript -->
    <script src="{{ url('/assets/clone/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Day.js -->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/locale/id.js"></script>
    <script src="{{ url('/assets/clone/js/zoom.js') }}"></script>
    <script>
        dayjs.extend(dayjs_plugin_relativeTime);
        dayjs.locale('id');
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen tombol dan elemen audio
            const openInvitationBtn = document.getElementById('openInvitation');
            const audio = document.getElementById('music');

            // Fungsi untuk memutar musik
            function playMusic() {
                audio.play().catch(e => console.log("Audio play failed:", e));
            }

            // Event listener untuk tombol open invitation
            if (openInvitationBtn) {
                openInvitationBtn.addEventListener('click', function() {
                    // Scroll ke bagian selanjutnya
                    document.querySelector('.welcome').scrollIntoView({
                        behavior: 'smooth'
                    });

                    // Putar musik saat undangan dibuka
                    playMusic();
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Buka Modal ketika tombol RSVP diklik
            $('#openModal').click(function() {
                $('#rsvpModal').removeClass('hidden');
                loadMessages(); // Memuat daftar pesan yang sudah ada
            });

            // Tutup Modal ketika tombol close diklik
            $('#closeModal').click(function() {
                $('#rsvpModal').addClass('hidden');
            });

            // Submit Form Konfirmasi Kehadiran dan Ucapan via AJAX
            $('#submitRsvpForm').click(function(e) {
                e.preventDefault();

                const namaPengunjung = $('#namaPengunjung').val().trim();
                const konfirmasiKehadiran = $('#konfirmasiKehadiran').val();
                const ucapan = $('#ucapan').val().trim();

                if (!namaPengunjung || !ucapan) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Nama dan ucapan tidak boleh kosong!'
                    });
                    return;
                }

                $.ajax({
                    url: '{{ route('messages.store') }}', // Ganti dengan route yang sesuai
                    method: 'POST',
                    data: {
                        name: namaPengunjung,
                        message: ucapan,
                        konfirmasi_kehadiran: konfirmasiKehadiran,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        if (res.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: '🌸 Terima Kasih 🌸',
                                text: 'Konfirmasi kehadiran dan ucapan Anda telah kami terima. Sampai jumpa di acara! 💖'
                            });
                            $('#rsvpModal').addClass(
                                'hidden'); // Menutup modal setelah berhasil
                            $('#submitRsvpForm')[0].reset(); // Reset form setelah sukses
                            loadMessages(); // Reload daftar pesan yang baru saja ditambahkan
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON?.errors?.message) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ups!',
                                text: xhr.responseJSON.errors.message[0]
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat mengirim konfirmasi. Coba lagi nanti.'
                            });
                        }
                    }
                });
            });
        });
    </script>

    <script>
        // Load Daftar Pesan yang Sudah Masuk
        function loadMessages() {
            $.ajax({
                url: '{{ route('messages.list') }}', // Endpoint untuk mengambil pesan
                method: 'GET',
                success: function(res) {
                    let html = '';
                    // Periksa apakah statusnya 'success' sebelum melanjutkan
                    if (res.status === 'success') {
                        res.messages.forEach(message => {
                            const waktu = dayjs(message.created_at)
                                .fromNow(); // Format waktu menggunakan dayjs

                            // Tentukan warna dan ukuran teks berdasarkan status konfirmasi_kehadiran
                            let konfirmasiKehadiranClass = '';
                            if (message.konfirmasi_kehadiran === 'hadir') {
                                konfirmasiKehadiranClass =
                                    '<span class="text-green-500 text-sm">Hadir</span>'; // Hijau dan kecil
                            } else if (message.konfirmasi_kehadiran === 'tidak_hadir') {
                                konfirmasiKehadiranClass =
                                    '<span class="text-red-500 text-sm">Tidak Hadir</span>'; // Merah dan lebih kecil
                            }

                            // Menambahkan HTML untuk setiap pesan
                            html += `
                        <div class="border-bottom pb-2 mb-2">
                            <strong>${message.name}</strong> <small class="text-muted">• ${waktu}</small><br>
                            ${konfirmasiKehadiranClass}<br>
                            <span>${message.message}</span>
                        </div>
                    `;
                        });

                        // Menampilkan pesan yang sudah dimuat
                        $('#pesanList').html(html);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops!',
                            text: 'Tidak ada pesan yang tersedia.'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat mengambil pesan. Coba lagi nanti.'
                    });
                }
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openInvitationBtn = document.getElementById('openInvitation');
            const coverInvitation = document.getElementById('coverInvitation');
            const heroSection = document.getElementById('heroSection');

            // Pastikan elemen ada di DOM
            if (openInvitationBtn && coverInvitation && heroSection) {
                // Menambahkan kelas no-scroll pada body untuk mencegah scroll
                document.body.classList.add('no-scroll');

                openInvitationBtn.addEventListener('click', function() {
                    // Menyembunyikan section cover invitation dengan transisi
                    coverInvitation.classList.add('hidden');

                    // Menampilkan section hero
                    heroSection.classList.add('show');

                    // Mengizinkan scroll setelah tombol diklik
                    document.body.classList.remove('no-scroll');
                    document.body.classList.add('allow-scroll');

                    // Scroll ke section hero dengan smooth
                    heroSection.scrollIntoView({
                        behavior: 'smooth'
                    });

                    // Setelah scroll selesai, mencegah scroll ke bagian atas (cover invitation)
                    window.scrollTo(0, 0); // Pastikan halaman tidak kembali ke atas
                });
            } else {
                console.error('Element not found: openInvitation, coverInvitation, or heroSection');
            }
        });
    </script>

</body>

</html>
