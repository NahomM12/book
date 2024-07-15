<!-- component -->
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
    <form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
      <div class="mb-5">
        <label
          for="name"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          title
        </label>
        <input
          type="text"
          name="title"
          id="title"
          placeholder="title"
          value="{{ old('title', $book->title) }}"required

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
          placeholder="author"
          value="{{old('author', $book->author)}}"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
      </div>
      
      <div class="mb-5">
        <label
          for="message"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Description
        </label>
        <textarea
          rows="4"
          name="description"
          id="description"
          placeholder="Type your message"required
         
          class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        >{{ old('description', $book->description) }}</textarea>
      </div>
      <div class="mb-5">
        <label
          for="subject"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          published_year
        </label>
        <input
          type="number"
          name="published_year"
          id="published_year"
          placeholder="Enter your subject"
          value="{{ old('published_year', $book->published_year) }}" required
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
      </div>
      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
          type="submit">
          Update Book
        </button>
      </div>
    </form>
  </div>
</div>
