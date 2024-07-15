<div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px]">
        <h1 class="text-2xl font-bold mb-5">Create New Book</h1>
        
        <form wire:submit.prevent="createBook">
            <div class="mb-5">
                <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                    Title
                </label>
                <input
                    type="text"
                    wire:model.blur="title"
                    id="title"
                    placeholder="Enter book title"
                    required
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-5">
                <label for="author" class="mb-3 block text-base font-medium text-[#07074D]">
                    Author
                </label>
                <input
                    type="text"
                    wire:model.blur="author"
                    id="author"
                    placeholder="Enter author name"
                    required
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
                @error('author') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-5">
                <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                    Description
                </label>
                <textarea
                    rows="4"
                    wire:model.blur="description"
                    id="description"
                    placeholder="Enter book description"
                    class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                ></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-5">
                <label for="published_year" class="mb-3 block text-base font-medium text-[#07074D]">
                    Published Year
                </label>
                <input
                    type="number"
                    wire:model="published_year"
                    id="published_year"
                    placeholder="Enter published year"
                    required
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
                @error('published_year') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-5">
    <label for="book_file" class="mb-3 block text-base font-medium text-[#07074D]">
        Book File (PDF)
    </label>
    <input
        type="file"
        wire:model="book_file"
        id="book_file"
        accept=".pdf"
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
    />
    @error('book_file') <span class="text-red-500">{{ $message }}</span> @enderror
</div>
            <div>
                <button
                    type="submit"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                >
                    Create Book
                </button>
            </div>
        </form>

        <h2 class="text-xl font-bold mt-8 mb-4">Books List</h2>
        <ul>
            @foreach($books as $book)
                <li class="mb-2">{{ $book->title }} by {{ $book->author }}</li>
            @endforeach
        </ul>
    </div>
</div>