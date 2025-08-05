<li class="satumomen_slide">
    <div class="container-mobile">
        @include('home-components.partials.frame')
        <div class="editable text-center font-latin color-accent h4 mt-4 animate__animated animate__fadeInDown animate__slower"
            style="font-size: 28.8px; padding-top: 100px;">
            Kirim Doa dan Ucapan</div>
        <div>
            <div class="d-flex justify-content-center align-items-center" style="height: 100%; text-align: center;">
                <div style="width: 100%;">
                    <div
                        class="text-center shadow animate__animated animate__fadeInUp animate__slower">
                        <p style="font-size: 14.4px;">Bergabunglah dalam kebahagiaan kami dengan mengirimkan doa dan
                            ucapan selamat!</p>
                        <p style="font-size: 14.4px;">Klik tombol di bawah ini untuk menyampaikan ucapan dan doa restu
                            dari hati Anda.</p>
                    </div>
                </div>
            </div>
            <div class="text-center ">
                <button type="button"
                    class="btn btn-primary rounded-pill animate__animated animate__fadeInUp animate__slower"
                    id="openModal">💌 Kirim Ucapan</button>
            </div>

        </div>
    </div>
</li>
<!-- Modal -->
<!-- Modal Manual Tanpa Backdrop -->
<div id="modalUcapanManual" class="d-none"
    style="position: fixed; top: 0; left: 0; z-index: 1055; width: 100%; height: 100%; overflow-y: auto; display: flex; align-items: center; justify-content: center;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title">Kirim Doa & Ucapan</h5>
                <button type="button" class="close" id="closeModal">
                    <span>&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Tampilkan Nama dari GET ?to -->
                <div class="mb-3">
                    <label class="text-muted">Dari:</label>
                    <div id="displayNama" class="font-weight-bold" style="font-size: 1.1rem;">(nama)</div>
                    <input type="hidden" id="namaPengirim">
                </div>

                <form id="formUcapan" autocomplete="off">
                    <div class="form-group">
                        <label for="isiUcapan">Doa & Ucapan</label>
                        <textarea class="form-control" id="isiUcapan" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded-pill">Kirim Ucapan</button>
                </form>

                <div class="mt-4">
                    <h6 class="text-muted">Ucapan dari yang lain:</h6>
                    <div id="daftarUcapan" style="max-height: 200px; overflow-y: auto;">
                        <!-- Daftar ucapan tampil di sini -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- jQuery dan Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Day.js -->
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/locale/id.js"></script>
<script>
    dayjs.extend(dayjs_plugin_relativeTime);
    dayjs.locale('id');
</script>


<script>
    // Helper ambil parameter dari URL
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param) || '';
    }

    $(document).ready(function() {
        const nama = getQueryParam('to') || 'Tamu';
        $('#displayNama').text(nama);
        $('#namaPengirim').val(nama);

        // Buka Modal
        $('#openModal').on('click', function() {
            $('#modalUcapanManual').removeClass('d-none');
            $('#isiUcapan').focus();

            // Ambil daftar ucapan dari database
            $.ajax({
                url: '{{ route('messages.list') }}',
                method: 'GET',
                success: function(res) {
                    if (res.status === 'success') {
                        const daftar = $('#daftarUcapan');
                        daftar.empty();

                        res.messages.forEach(msg => {
                            const waktu = dayjs(msg.created_at).fromNow();
                            const html = `
                                <div class="border-bottom pb-2 mb-2">
                                    <strong>${msg.name}</strong> <small class="text-muted">• ${waktu}</small><br>
                                    <span>${msg.message}</span>
                                </div>
                            `;
                            daftar.append(html);
                        });
                    }
                },
                error: function() {
                    $('#daftarUcapan').html(
                        '<div class="text-danger">Gagal memuat ucapan.</div>');
                }
            });
        });

        // Tutup Modal
        $('#closeModal').on('click', function() {
            $('#modalUcapanManual').addClass('d-none');
        });

        // Tutup Modal jika klik area luar konten
        $(document).on('click', function(e) {
            if ($(e.target).is('#modalUcapanManual')) {
                $('#modalUcapanManual').addClass('d-none');
            }
        });

        // Submit Form Ucapan via AJAX
        $('#formUcapan').on('submit', function(e) {
            e.preventDefault();
            const name = $('#namaPengirim').val().trim();
            const message = $('#isiUcapan').val().trim();

            if (!message) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Ucapan tidak boleh kosong!'
                });
                return;
            }

            $.ajax({
                url: '{{ route('messages.store') }}',
                method: 'POST',
                data: {
                    name: name,
                    message: message,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    if (res.status === 'success') {
                        const waktu = dayjs(res.message.created_at).fromNow();
                        const html = `
                            <div class="border-bottom pb-2 mb-2">
                                <strong>${res.message.name}</strong> <small class="text-muted">• ${waktu}</small><br>
                                <span>${res.message.message}</span>
                            </div>
                        `;
                        $('#daftarUcapan').prepend(html);
                        $('#formUcapan')[0].reset();

                        Swal.fire({
                            icon: 'success',
                            title: '🌸 Terima Kasih 🌸',
                            html: 'Doa dan ucapan hangatmu telah kami terima. Semoga kebaikanmu dibalas berlipat ganda. Aamiin 💖 <br>- Aji & Diani'
                        });


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
                            text: 'Terjadi kesalahan saat mengirim ucapan. Coba lagi nanti.'
                        });
                    }
                }

            });
        });
    });
</script>


<style>
    /* Modal Manual Tanpa Backdrop */
    #modalUcapanManual.d-none {
        display: none !important;
    }

    #modalUcapanManual {
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>
