<li class="satumomen_slide">
    <div class="container-mobile">
        @include('home-components.partials.frame')
        <div class="d-flex justify-content-center align-items-center" style="height: 100%; ">
            <div style="width: 100%;" class="text-center">
                <div class="font-latin color-accent h4 mb-2 editable animate__animated animate__fadeInDown animate__slower"
                    style="font-size: 28.8px;">Tanda Kasih</div>
                <div class="editable mb-4 animate__animated animate__fadeInDown animate__slower"
                    style="font-size: 14.4px;">Terima kasih telah menambah semangat
                    kegembiraan pernikahan kami dengan kehadiran dan hadiah indah
                    Anda.</div>
                <div style="display: flex;gap: 8px;">
                    <button type="button"
                        class="btn-gift btn btn-block btn-primary rounded-pill animate__animated animate__fadeInUp animate__slow"
                        style="max-width: 150px; margin: auto; font-size: 14.4px;">🎁
                        Cashless</button>
                    <button type="button"
                        class="btn-gift btn btn-block btn-primary rounded-pill animate__animated animate__fadeInUp animate__slow"
                        style="max-width: 150px; margin: auto; font-size: 14.4px;">🎁
                        Kirim Kado</button>
                </div>
                <div class="gift-container mt-3 p-4 rounded" style="">
                    <div class="d-flex animate__animated animate__zoomIn animate__slow">
                        <div class="mx-auto">

                            <div class="d-flex align-items-center mb-3">
                                <div style="width:80px;overflow: hidden;" class="image-editable">
                                    <img src="https://bankmandiri.co.id/image/layout_set_logo?img_id=31567&t=1723395756857"
                                        style="width: 100%;height: 100%;object-fit: contain;" draggable="false">
                                </div>
                                <div class="text-left pl-2">
                                    <div class="editable account-number font-weight-bold h5 mb-0">
                                        1730012307030</div>
                                    <div class="editable" style="font-size: 14.4px;">Diani Maulina</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div style="width:80px;overflow: hidden;" class="image-editable">
                                    <img src="https://vectorseek.com/wp-content/uploads/2023/09/Bca-Bank-Central-Asia-Logo-Vector.svg-.png"
                                        style="width: 100%;height: 100%;object-fit: contain;" draggable="false">
                                </div>

                                <div class="text-left pl-2">
                                    <div class="editable account-number font-weight-bold h5 mb-0">
                                        8801544380</div>
                                    <div class="editable" style="font-size: 14.4px;">Slamet Aji Suryana
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gift-container mt-3 p-4 rounded" style="">
                    <div class="text-center mb-2 animate__animated animate__zoomIn animate__slow">
                        <div class="editable font-weight-bold h5 color-accent mb-2">
                            Kirim Kado</div>
                            <div class="editable mb-2">
                            Anda dapat mengirim kado ke:
                        </div>
                        <div class="editable mb-2" id="alamatKado">
                            Rumah H Isnanto, Jl. RE Martadinata, Gang Masjid Jami Nurul Ikhlas,<br>
                            RT 003/RW 005, Cipayung, Ciputat, Kota Tangerang Selatan, Banten 15411<br>
                            (Rumah Ujung Gang Masjid)
                        </div>
                        <button class="btn btn-primary btn-sm rounded-pill" onclick="salinAlamat()">📋 Salin
                            Alamat</button>
                    </div>
                </div>

                <script>
                    function salinAlamat() {
                        const alamat = document.getElementById('alamatKado').innerText;
                        navigator.clipboard.writeText(alamat).then(function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Alamat berhasil disalin!',
                                text: 'Silakan tempel di aplikasi pengiriman favoritmu.'
                            });
                        }).catch(function(err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ups!',
                                text: 'Gagal menyalin alamat. Silakan coba manual.'
                            });
                        });
                    }
                </script>

            </div>
        </div>
    </div>
</li>
