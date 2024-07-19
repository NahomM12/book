<div class="relative overflow-hidden">
  <div class="flex items-center justify-center h-64 transform transition-all duration-500 ease-in-out">
    <div class="book-cover w-40 h-56 bg-gray-300 rounded-md mr-6 transform transition-all duration-500 ease-in-out opacity-50 scale-90">
      <!-- Book cover 1 -->
    </div>
    <div class="book-cover w-56 h-80 bg-red-500 rounded-md mr-6 transform transition-all duration-500 ease-in-out scale-100 opacity-100">
      <!-- Book cover 2 -->
    </div>
    <div class="book-cover w-40 h-56 bg-gray-300 rounded-md transform transition-all duration-500 ease-in-out opacity-50 scale-90">
      <!-- Book cover 3 -->
    </div>
  </div>
  <button class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-800 hover:text-gray-900 focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
    </svg>
  </button>
  <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-800 hover:text-gray-900 focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
  </button>
</div>

<script>
  const bookCovers = document.querySelectorAll('.book-cover');
  let currentIndex = 1;

  function slideBooks() {
    bookCovers.forEach((cover, index) => {
      cover.classList.remove('scale-100', 'opacity-100');
      cover.classList.add('scale-90', 'opacity-50');

      if (index === currentIndex) {
        cover.classList.remove('scale-90', 'opacity-50');
        cover.classList.add('scale-100', 'opacity-100');
      }
    });

    currentIndex = (currentIndex + 1) % bookCovers.length;
  }

  setInterval(slideBooks, 5000);

  document.querySelectorAll('button').forEach(btn => {
    btn.addEventListener('click', (e) => {
      if (e.target.classList.contains('left')) {
        currentIndex = (currentIndex - 1 + bookCovers.length) % bookCovers.length;
      } else {
        currentIndex = (currentIndex + 1) % bookCovers.length;
      }
      slideBooks();
    });
  });
</script>