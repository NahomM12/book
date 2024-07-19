<div class="relative">
    <div class="overflow-hidden">
        <div class="flex transition-transform duration-300 ease-in-out" x-data="{ activeSlide: 0 }" x-ref="slider">
            @foreach ($books as $index => $book)
                <div class="w-full flex-shrink-0" x-show="activeSlide === {{ $index }}">
                    <div class="p-4">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                @if($book->cover_path)
                                    <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('storage/' . $book->cover_path) }}" alt="{{ $book->title }} cover">
                                @else
                                    <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500 text-lg">No cover available</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <h2 class="mt-2 mb-2 font-bold">{{ $book->title }}</h2>
                                <p class="text-sm">{{ $book->author }}</p>
                                <div class="mt-3 flex items-center">
                                    <span class="text-sm font-semibold">Year:</span>&nbsp;<span class="font-bold text-xl">{{ $book->year }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Navigation arrows -->
    <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 ml-4 shadow-md"
            x-on:click="activeSlide = activeSlide === 0 ? {{ count($books) - 1 }} : activeSlide - 1">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>
    <button class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 mr-4 shadow-md"
            x-on:click="activeSlide = activeSlide === {{ count($books) - 1 }} ? 0 : activeSlide + 1">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
    
    <!-- Indicators -->
    <div class="absolute bottom-0 left-0 right-0 flex justify-center p-4">
        @foreach ($books as $index => $book)
            <button class="w-3 h-3 rounded-full mx-1" 
                    :class="{ 'bg-gray-800': activeSlide === {{ $index }}, 'bg-gray-400': activeSlide !== {{ $index }} }"
                    x-on:click="activeSlide = {{ $index }}">
            </button>
        @endforeach
    </div>
</div>