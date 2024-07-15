
  <div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px]">
      <h1 class="text-2xl font-bold mb-5">Create New Book</h1>
      
     

      <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-5">
          <label
            for="title"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Title
          </label>
          <input
            type="text"
            name="title"
            id="title"
            placeholder="Enter book title"
            value="{{ old('title') }}"
            required
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
        <div class="mb-5">
          <label
            for="author"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Author
          </label>
          <input
            type="text"
            name="author"
            id="author"
            placeholder="Enter author name"
            value="{{ old('author') }}"
            required
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
        <div class="mb-5">
          <label
            for="description"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Description
          </label>
          <textarea
            rows="4"
            name="description"
            id="description"
            placeholder="Enter book description"
            class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          >{{ old('description') }}</textarea>
        </div>
        <div class="mb-5">
          <label
            for="published_year"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Published Year
          </label>
          <input
            type="number"
            name="published_year"
            id="published_year"
            placeholder="Enter published year"
            value="{{ old('published_year') }}"
            required
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
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
    </div>
  </div>

