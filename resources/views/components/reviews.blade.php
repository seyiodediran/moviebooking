
<section class="py-8 lg:py-16 px-4 md:px-0">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-white">Reviews</h2>
        </div>
        <form action="/reviews" method='POST' class="mb-6">
            @csrf
            <div
                class="py-2 px-4 mb-4 rounded-lg rounded-t-lg border border-gray-200 bg-gray-800 border-gray-700">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" rows="6"
                    class="px-0 w-full text-sm text-white border-0 focus:ring-0 focus:outline-none placeholder-gray-400  bg-gray-800"
                    placeholder="Leave a review..." name="review_text" required style="resize: none;"></textarea>
                @error('review_text')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message = 'Review is required to post' }}
                    </p>
                @enderror
            </div>
            <Input type="hidden" name="movie_listings_id" value="{{ $movie->id }}">
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded focus:ring-4 focus:ring-primary-200  focus:ring-primary-900 hover:bg-primary-800">
                Post comment
            </button>
        </form>

        @foreach ($review as $review)
            <article class="p-6 mb-6 text-base rounded-lg  bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center justify-between w-full">
                        @if($review->user)
                            <p class="inline-flex items-center mr-3 text-sm text-gray-400 text-white"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="">
                                {{ $review->user->name }}</p>
                        @else
                            <p class="inline-flex items-center mr-3 text-sm text-gray-400 text-white"><img
                                    class="mr-2 w-6 h-6 rounded-full" src={{ asset('/images/user-img.png') }}
                                    alt="">
                                    Guest
                            </p>
                        @endif
                            <p class="text-sm text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">{{ $review->created_at->diffForHumans() }}</time></p>
                        </div>
                        {{-- <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50  bg-gray-900  hover:bg-gray-700  focus:ring-gray-600"
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                            </path>
                        </svg>
                        <span class="sr-only">Comment settings</span>
                    </button> --}}
                        <!-- Dropdown menu -->
                        {{-- <div id="dropdownComment1"
                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow  bg-gray-700  divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700  text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100  hover:bg-gray-600  hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100  hover:bg-gray-600  hover:text-white">Remove</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100  hover:bg-gray-600  hover:text-white">Report</a>
                            </li>
                        </ul>
                    </div> --}}
                    </footer>
                    <p class="text-gray-500  text-gray-400"> {{ $review->review_text }}</p>
                    {{-- <div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                            class="flex items-center text-sm text-gray-500 hover:underline  text-gray-400">
                            <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Reply
                        </button>
                    </div> --}}
                </article>
            @endforeach
        </div>
    </section>
