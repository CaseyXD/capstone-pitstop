let slideIndex = 1;
showSlides(slideIndex);

// Fungsi untuk mengubah slide
function changeSlide(n) {
    showSlides(slideIndex += n);
}

// Fungsi untuk menampilkan slide yang sesuai
function currentSlide(n) {
    showSlides(slideIndex = n);
}

// Fungsi untuk menampilkan slide
function showSlides(n) {
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");

    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Sembunyikan semua slide
    }

    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", ""); // Hapus kelas aktif dari semua dot
    }

    slides[slideIndex - 1].style.display = "block"; // Tampilkan slide yang sesuai
    dots[slideIndex - 1].className += " active"; // Tambahkan kelas aktif pada dot yang sesuai
}