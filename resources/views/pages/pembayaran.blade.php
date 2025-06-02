<script>
document.addEventListener('DOMContentLoaded', function() {
    let debug = window.sessionStorage.getItem('uploadPhotoDebug');
    if (debug) {
        let data = JSON.parse(debug);
        let msg = 'Status upload foto:\n' + (data.debug ? data.debug.join('\n') : JSON.stringify(data));
        alert(msg); // Atau tampilkan di elemen HTML sesuai kebutuhan
        // Hapus agar tidak muncul lagi di reload berikutnya
        window.sessionStorage.removeItem('uploadPhotoDebug');
    }
});
</script>