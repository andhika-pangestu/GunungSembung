document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('#carouselExampleIndicators');
    const items = carousel.querySelectorAll('[data-twe-carousel-item]');
    const prevButton = carousel.querySelector('[data-twe-slide="prev"]');
    const nextButton = carousel.querySelector('[data-twe-slide="next"]');
    const indicators = carousel.querySelectorAll('[data-twe-carousel-indicators] button');
    
    let currentIndex = 0;
 
    function updateCarousel(index) {
       items.forEach((item, i) => {
          if (i === index) {
             item.classList.remove('hidden');
             item.classList.add('block');
             indicators[i].classList.add('opacity-100');
             indicators[i].classList.remove('opacity-50');
          } else {
             item.classList.add('hidden');
             item.classList.remove('block');
             indicators[i].classList.add('opacity-50');
             indicators[i].classList.remove('opacity-100');
          }
       });
       currentIndex = index;
    }
 
    function showNext() {
       const nextIndex = (currentIndex + 1) % items.length;
       updateCarousel(nextIndex);
    }
 
    function showPrev() {
       const prevIndex = (currentIndex - 1 + items.length) % items.length;
       updateCarousel(prevIndex);
    }
 
    // Event listeners for buttons
    nextButton.addEventListener('click', showNext);
    prevButton.addEventListener('click', showPrev);
 
    // Event listeners for indicators
    indicators.forEach((indicator, index) => {
       indicator.addEventListener('click', () => {
          updateCarousel(index);
       });
    });
 
    // Auto-slide functionality (optional)
    let autoSlide = setInterval(showNext, 5000);
 
    // Pause auto-slide on hover
    carousel.addEventListener('mouseover', () => clearInterval(autoSlide));
    carousel.addEventListener('mouseleave', () => autoSlide = setInterval(showNext, 5000));
 });
 

 // Script untuk toggle menu
document.getElementById('menu-toggle').addEventListener('click', function () {
   const menu = document.getElementById('menu');
   menu.classList.toggle('hidden'); // Menambah/menghapus kelas 'hidden' untuk menu
});


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
   anchor.addEventListener('click', function (e) {
       e.preventDefault(); // Mencegah aksi default klik link

       const target = document.querySelector(this.getAttribute('href'));
       if (target) {
           target.scrollIntoView({
               behavior: 'smooth', // Scroll dengan efek halus
               block: 'start'     // Mulai scroll ke bagian atas elemen
           });
       }
   });
});

