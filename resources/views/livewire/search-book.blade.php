<div>
    <div class="mb-4 flex items-center">
        <input 
            wire:model="search" 
            type="text" 
            placeholder="Search..."
            class="w-1/8 px-2 py-1 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
        >
        <button 
            wire:click="searchBooks"
            class="px-3 py-1 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
        >
            Search
        </button>
    </div>

    @if(count($results) > 0)
        <ul>
            @foreach($results as $book)
                <li class="mb-2 p-2 border rounded hover:bg-gray-100">
                    {{ $book->title }} by {{ $book->author }} ({{ $book->published_year }})
                </li>
            @endforeach
        </ul>
    @elseif($search !== '')
        <p>No books found matching "{{ $search }}"</p>
    @endif
</div>