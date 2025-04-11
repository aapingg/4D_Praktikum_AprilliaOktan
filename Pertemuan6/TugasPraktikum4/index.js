function cekNilai() {
    let nim = document.getElementById("nim").value.trim();
    let nilai = parseFloat(document.getElementById("nilai").value);
    let hasil = document.getElementById("hasil");
    let nimError = document.getElementById("nim-error");
    let nilaiError = document.getElementById("nilai-error");

    // Reset pesan error
    nimError.innerText = "";
    nilaiError.innerText = "";

    // Validasi NIM
    if (nim === "") {
        nimError.innerText = "NIM wajib diisi!";
        return;
    }

    // Validasi Nilai
    if (isNaN(nilai) || nilai < 0 || nilai > 100) {
        nilaiError.innerText = "Masukkan nilai antara 0 - 100!";
        return;
    }

    // Menentukan Huruf Mutu
    let hurufMutu = "";
    if (nilai >= 80 && nilai <= 100) {
        hurufMutu = "A";
    } else if (nilai >= 70) {
        hurufMutu = "B";
    } else if (nilai >= 60) {
        hurufMutu = "C";
    } else if (nilai >= 50) {
        hurufMutu = "D";
    } else {
        hurufMutu = "E";
    }

    hasil.style.color = "saddlebrown";
    hasil.innerText = `NIM: ${nim}\nHuruf Mutu: ${hurufMutu}`;
}