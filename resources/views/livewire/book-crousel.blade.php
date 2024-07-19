<div class="relative overflow-hidden">
    <div class="flex items-center justify-center h-64 transform transition-all duration-500 ease-in-out">
        @foreach ($books as $index => $book)
        <div class="book-cover w-40 h-56 rounded-md mr-6 transform transition-all duration-500 ease-in-out opacity-50 scale-90 @if($index == $currentIndex) scale-100 opacity-100 @endif"
             style="background-image: url('{{ asset('storage/' . $book->file_path) }}');">
            <div class="title bg-red-500 bg-opacity-50 text-white font-bold px-2 py-1 rounded-t-md">
                {{ $book->title }}
            </div>
            <div class="authors bg-green-500 bg-opacity-50 text-white font-bold px-2 py-1 rounded-b-md">
                {{ $book->author }}
            </div>
        </div>
        @endforeach
    </div>
    <button wire:click="prevBook" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-800 hover:text-gray-900 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>
    <button wire:click="nextBook" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-800 hover:text-gray-900 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('start-auto-transition', function (data) {
            let interval = data.interval;
            let autoTransitionTimer;

            function startAutoTransition() {
                autoTransitionTimer = setInterval(function () {
                    Livewire.emit('nextBook');
                }, interval);
            }

            function stopAutoTransition() {
                clearInterval(autoTransitionTimer);
            }

            startAutoTransition();

            document.addEventListener('visibilitychange', function () {
                if (document.visibilityState === 'visible') {
                    startAutoTransition();
                } else {
                    stopAutoTransition();
                }
            });
        });
    });
</script>
@endpush