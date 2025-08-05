<script src="{{ url('assets/js/app.js') }}"></script>
<script src="{{ url('assets/themes/themesv2.js') }}"></script>
<script>
    (function() {
        // Ambil semua parameter GET yang ada di URL saat ini
        const currentParams = new URLSearchParams(window.location.search);

        // Fungsi untuk memperbarui URL dengan mempertahankan parameter GET
        function updateUrlWithParams(newParams) {
            const url = new URL(window.location.href);
            newParams.forEach((value, key) => {
                url.searchParams.set(key, value);
            });
            window.history.replaceState({}, '', url);
        }

        // Saat halaman dimuat, pastikan URL mempertahankan parameter GET
        window.addEventListener('load', function() {
            updateUrlWithParams(currentParams);
        });

        // Jika ada interaksi yang menyebabkan URL berubah, tambahkan parameter GET
        window.addEventListener('popstate', function() {
            updateUrlWithParams(currentParams);
        });

        // Contoh untuk memastikan setiap kali user mengklik elemen tertentu,
        // URL diperbarui dengan mempertahankan parameter GET
        document.querySelectorAll('a, button').forEach(function(element) {
            element.addEventListener('click', function(event) {
                updateUrlWithParams(currentParams);
            });
        });
    })();
</script>
