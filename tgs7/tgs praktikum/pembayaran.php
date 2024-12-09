<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="tampilan2.css">
</head>
<body>
    <main>
        <div class="form-container">
            <div class="icon-pembayaran"></div>
            <h2>Pembayaran</h2>
            <form id="payment-form">
                <label for="metode-pembayaran">Metode Pembayaran:</label>
                <select id="metode-pembayaran" name="metode-pembayaran" required>
                    <option value="transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet (OVO, GoPay, DANA)</option>
                    <option value="kartu-kredit">Kartu Kredit</option>
                </select>

                <label for="nama-pemilik">Nama Pemilik Rekening / Kartu:</label>
                <input type="text" id="nama-pemilik" name="nama-pemilik" placeholder="Masukkan nama pemilik" required>

                <label for="nomor-pembayaran">Nomor Rekening / Kartu / E-Wallet:</label>
                <input type="text" id="nomor-pembayaran" name="nomor-pembayaran" placeholder="Masukkan nomor" required>

                <label for="jumlah-pembayaran">Jumlah Pembayaran:</label>
                <input type="text" id="jumlah-pembayaran" name="jumlah-pembayaran" readonly>

                <label for="catatan">Catatan (Opsional):</label>
                <textarea id="catatan" name="catatan" placeholder="Tambahkan catatan jika ada"></textarea>

                <div id="data-penitipan"></div>

                <button type="submit">Bayar Sekarang</button>
            </form>
        </div>
    </main>

    <script>
        // Mengambil data dari localStorage
        const barangData = JSON.parse(localStorage.getItem('penitipanBarangData'));
        const kendaraanData = JSON.parse(localStorage.getItem('penitipanKendaraanData'));
        const detailContainer = document.getElementById('data-penitipan');
        let totalHarga = 0;

        // Menentukan data yang akan ditampilkan
        if (barangData) {
            totalHarga = parseInt(barangData.harga.replace('Rb', '')) * 1000 * barangData.lamaPenitipan; 
            document.getElementById('jumlah-pembayaran').value = `Rp ${totalHarga}`;
            detailContainer.innerHTML = `<h3>Detail Penitipan:</h3>
                                          <p>Nama: ${barangData.nama}</p>
                                          <p>Jenis: Penitipan Barang</p>
                                          <p>Tipe: ${barangData.tipeBarang}</p>
                                          <p>Lama Penitipan: ${barangData.lamaPenitipan} hari</p>
                                          <p>Harga Per Hari: ${barangData.harga}</p>
                                          <p>Total Harga: Rp ${totalHarga}</p>`;
        } else if (kendaraanData) {
            totalHarga = parseInt(kendaraanData.harga.replace('Rb', '')) * 1000 * kendaraanData.lamaPenitipan; 
            document.getElementById('jumlah-pembayaran').value = `Rp ${totalHarga}`;
            detailContainer.innerHTML = `<h3>Detail Penitipan:</h3>
                                          <p>Nama: ${kendaraanData.nama}</p>
                                          <p>Jenis: Penitipan Kendaraan</p>
                                          <p>Tipe: ${kendaraanData.tipeKendaraan}</p>
                                          <p>Lama Penitipan: ${kendaraanData.lamaPenitipan} hari</p>
                                          <p>Harga Per Hari: ${kendaraanData.harga}</p>
                                          <p>Total Harga: Rp ${totalHarga}</p>`;
        } else {
            detailContainer.innerHTML = `<p>Tidak ada data penitipan.</p>`;
        }

        document.getElementById('payment-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah submit default
            
            // Kumpulkan data pembayaran
            const paymentData = {
                metodePembayaran: document.getElementById("metode-pembayaran").value,
                namaPemilik: document.getElementById("nama-pemilik").value,
                nomorPembayaran: document.getElementById("nomor-pembayaran").value,
                jumlahPembayaran: document.getElementById("jumlah-pembayaran").value,
                catatan: document.getElementById("catatan").value,
                kategori: barangData ? "Penitipan Barang" : "Penitipan Kendaraan", // Tentukan kategori
                tanggal: new Date().toLocaleDateString()
            };

            // Ambil data transaksi yang sudah ada di localStorage
            const existingData = JSON.parse(localStorage.getItem('paymentDataArray')) || [];

            // Tambahkan data baru ke dalam array
            existingData.push(paymentData);

            // Simpan kembali array yang diperbarui ke localStorage
            localStorage.setItem('paymentDataArray', JSON.stringify(existingData));

            // Alihkan ke halaman Transaction
            window.location.href = 'transaction.php';
        });
    </script>
    
    <div id="snackbar-pembayaran">Pembayaran berhasil!</div>
</body>
</html>