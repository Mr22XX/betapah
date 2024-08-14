document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('edit-modal');
    const closeModalButton = document.getElementById('close-modal');

    // Fungsi untuk membuka modal
    function openModal() {
      modal.classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    function closeModal() {
      modal.classList.add('hidden');
    }

    // Periksa URL saat halaman dimuat
    function checkURLForModal() {
      const urlParams = new URLSearchParams(window.location.search);
      const id = urlParams.get('id');
      const hal = urlParams.get('hal');

      // Jika parameter 'hal' adalah 'edit' dan 'id' ada
      if (hal === 'edit' && id) {
        openModal();
      }
    }

    // Panggil fungsi untuk memeriksa URL
    checkURLForModal();

    // Menambahkan event listener pada tombol tutup modal
    closeModalButton.addEventListener('click', () => {
      closeModal();
    });

    // Menutup modal ketika mengklik di luar modal
    window.addEventListener('click', (event) => {
      if (event.target === modal) {
        closeModal();
      }
    });
  });