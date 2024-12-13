<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="..css/pembayaran2.css">
</head>

<body>
    <main>
        <div class="form-container">
            <div class="icon-pembayaran"></div>
            <h2>Pembayaran</h2>
            <form id="payment-form" method="POST" action="proses_pembayaran.php">
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

                <!-- Detail Penitipan -->
                <h3>Detail Penitipan:</h3>

                <label for="nama-detail">Nama:</label>
                <input type="text" id="nama-detail" name="nama-detail" readonly>

                <label for="jenis-detail">Jenis:</label>
                <input type="text" id="jenis-detail" name="jenis-detail" readonly>

                <label for="lama-penitipan">Lama Penitipan (Hari):</label>
                <input type="text" id="lama-penitipan" name="lama-penitipan" readonly>

                <label for="total-harga">Total Harga:</label>
                <input type="text" id="total-harga" name="total-harga" readonly>

                <button type="submit">Bayar Sekarang</button>
            </form>
        </div>
    </main>

    <script>
        // Mengambil data dari localStorage
        // Retrieve stored data
        const dataPenitipan = JSON.parse(localStorage.getItem('penitipanBarangData'));

        // Calculate total price if data is available
        if (dataPenitipan) {
            const totalHarga = parseInt(dataPenitipan.harga.replace('Rb', '').replace('Rp', '')) * 1000 * dataPenitipan.lamaPenitipan;
            document.getElementById('jumlah-pembayaran').value = `Rp ${totalHarga}`;
            document.getElementById('nama-detail').value = dataPenitipan.nama;
            document.getElementById('jenis-detail').value = "Penitipan Barang";
            document.getElementById('lama-penitipan').value = dataPenitipan.lamaPenitipan;
            document.getElementById('total-harga').value = `Rp ${totalHarga}`;
        } else {
            document.getElementById('nama-detail').value = "Tidak ada data";
            document.getElementById('jenis-detail').value = "Tidak ada data";
            document.getElementById('lama-penitipan').value = "Tidak ada data";
            document.getElementById('jumlah-pembayaran').value = "Tidak ada data";
        }

        document.getElementById('payment-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Mencegah submit default

            // Kumpulkan data pembayaran
            const paymentData = {
                metodePembayaran: document.getElementById("metode-pembayaran").value,
                namaPemilik: document.getElementById("nama-pemilik").value,
                nomorPembayaran: document.getElementById("nomor-pembayaran").value,
                jumlahPembayaran: document.getElementById("jumlah-pembayaran").value,
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