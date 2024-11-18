document.addEventListener("DOMContentLoaded", function () {
  const toggleButtons = document.querySelectorAll('.toggleButton');
  
  toggleButtons.forEach(button => {
    button.addEventListener('click', function () {
      const shortSubtitle = button.closest('.card').querySelector('.short-subtitle');
      const longSubtitle = button.closest('.card').querySelector('.long-subtitle');
      let isExpanded = false;

      if (shortSubtitle && longSubtitle) {
        isExpanded = longSubtitle.classList.contains('hidden');
        
        if (isExpanded) {
          shortSubtitle.classList.add('hidden');
          longSubtitle.classList.remove('hidden');
          button.textContent = 'Read Less';
        } else {
          shortSubtitle.classList.remove('hidden');
          longSubtitle.classList.add('hidden');
          button.textContent = 'Read More';
        }
      }
    });
  });
});
