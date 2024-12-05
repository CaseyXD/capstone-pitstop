
        let lastScrollTop = 0; // Menyimpan posisi scroll terakhir
        const navbar = document.querySelector('.navbar'); // Mengambil elemen navbar
    
        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop; // Mendapatkan posisi scroll saat ini
    
            if (scrollTop > lastScrollTop) {
                // Jika scroll ke bawah, sembunyikan navbar
                navbar.style.top = "-60px"; // Sesuaikan dengan tinggi navbar Anda
            } else {
                // Jika scroll ke atas, tampilkan navbar
                navbar.style.top = "0";
            }
            lastScrollTop = scrollTop; // Update posisi scroll terakhir
        });
