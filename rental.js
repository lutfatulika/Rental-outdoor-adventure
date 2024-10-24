document.getElementById('loanPaymentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form dari pengiriman default

    // Mengambil data dari form
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const equipment = document.getElementById('equipment').value;
    const duration = document.getElementById('duration').value;
    const paymentMethod = document.getElementById('paymentMethod').value;
    const totalAmount = document.getElementById('totalAmount').value;

    // Membuat objek data peminjaman dan pembayaran
    const loanPaymentData = {
        name,
        email,
        phone,
        equipment,
        duration,
        paymentMethod,
        totalAmount
    };

    // Menyimpan data ke localStorage
    let storedData = JSON.parse(localStorage.getItem('loanPaymentData')) || [];
    storedData.push(loanPaymentData);
    localStorage.setItem('loanPaymentData', JSON.stringify(storedData));

    // Mereset form setelah submit
    document.getElementById('loanPaymentForm').reset();

    // Menampilkan data yang tersimpan
    displayLoanPaymentData();
});

// Fungsi untuk menampilkan data peminjaman dan pembayaran yang tersimpan
function displayLoanPaymentData() {
    const loanPaymentDataDiv = document.getElementById('loanPaymentData');
    loanPaymentDataDiv.innerHTML = ''; // Menghapus isi sebelumnya

    const storedData = JSON.parse(localStorage.getItem('loanPaymentData')) || [];

    if (storedData.length === 0) {
        loanPaymentDataDiv.textContent = 'Belum ada data peminjaman dan pembayaran tersimpan.';
    } else {
        storedData.forEach((data, index) => {
            const loanPaymentItemDiv = document.createElement('div');
            loanPaymentItemDiv.classList.add('loan-payment-item');
            loanPaymentItemDiv.innerHTML = `
                <strong>Peminjaman ${index + 1}</strong><br>
                Nama: ${data.name}<br>
                Email: ${data.email}<br>
                Nomor Telepon: ${data.phone}<br>
                Alat: ${data.equipment}<br>
                Durasi: ${data.duration} hari<br>
                Metode Pembayaran: ${data.paymentMethod}<br>
                Total Pembayaran: Rp ${data.totalAmount}
            `;
            loanPaymentDataDiv.appendChild(loanPaymentItemDiv);
        });
    }
}

// Menampilkan data saat halaman dimuat
document.addEventListener('DOMContentLoaded', displayLoanPaymentData);
