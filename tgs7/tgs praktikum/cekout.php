<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengisian Data Diri - Penitipan Barang</title>
    <link rel="stylesheet" href="tampilan2.css">
</head>

<body>
    <main>
        <div class="form-container">
            <div class="icon-barang"></div>
            <h2> Data Penyewa</h2>
            <form onsubmit="saveData(event)">
                <label for="nama">Nama Penitip:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="tipe-barang">Tipe Barang:</label>
                <select id="tipe-barang" name="tipe-barang" onchange="updateHarga()" required>
                    <option value="carrier">Carrier</option>
                    <option value="tracking poll">Traccking poll</option>
                    <option value="kursi">kursi</option>
                    <option value="sepatu hikking">Sepatu hikking</option>
                    <option value="alat masak">Alat masak</option>
                    <option value="tenda">Tenda</option>
                </select>


                <label for="lama-penitipan">Lama Penitipan Per hari:</label>
                <input type="number" id="lama-penitipan" name="lama-penitipan" placeholder="Lama Per hari" required>

                <label for="harga">Harga :</label>
                <input type="text" id="harga" name="harga" value="120" readonly>

                <input type="hidden" name="jenis" value="barang">
                <input type="hidden" id="total-harga" name="total-harga" value="">

                <button type="submit">Lanjut ke Pembayaran</button>
            </form>
        </div>
    </main>
    <script>
        function updateHarga() {
            var tipeBarang = document.getElementById("tipe-barang").value;
            var hargaInput = document.getElementById("harga");

            if (tipeBarang === "carrier") {
                hargaInput.value = "120";
            } else if (tipeBarang === "traccking pol") {
                hargaInput.value = "70Rb";
            } else if (tipeBarang === "kursi") {
                hargaInput.value = "20Rb";
            } else if (tipeBarang === "tenda") {
                hargaInput.value = "150";
            } else if (tipeBarang === "sepatu hikking") {
                hargaInput.value = "170";
            } else if (tipeBarang === "alat masak") {
                hargaInput.value = "50";

            }
        }
        function addTotalHarga() {
            const hargaPerHari = parseInt(document.getElementById('harga').value.replace('Rb', '')) * 1000;
            const lamaPenitipan = parseInt(document.getElementById('lama-penitipan').value);
            const totalHarga = hargaPerHari * lamaPenitipan;
            document.getElementById('total-harga').value = totalHarga; // Menyimpan total harga di field tersembunyi
        }

        function saveData(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            const formData = {
                nama: document.getElementById("nama").value,
                tipeBarang: document.getElementById("tipe-barang").value,
                lamaPenitipan: document.getElementById("lama-penitipan").value,
                harga: document.getElementById("harga").value,
                totalHarga: document.getElementById("total-harga").value
            };

            localStorage.setItem("penitipanBarangData", JSON.stringify(formData));
            window.location.href = "pembayaran.php"; // Alihkan ke halaman pembayaran
        }
    </script>
</body>
</html>