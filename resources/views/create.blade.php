<x-layout>

    <div class="bg-gray-50 border border-gray-200 p-10 max-w-lg mx-auto mt-24 mb-48">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Add Movie
            </h2>
        </header>

        <form action="/movies" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="Title" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Title" placeholder="Movie Name"
                    value="{{ old('Title') }}">
                @error('Title')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Plot" class="inline-block text-lg mb-2">
                    Plot
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Plot" placeholder="Description"
                    value="{{ old('Plot') }}">
                @error('Plot')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Year" class="inline-block text-lg mb-2">
                    Year
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Year" placeholder="2023"
                    value="{{ old('Year') }}">
                @error('Year')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Genre" class="inline-block text-lg mb-2">
                    Genre
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Genre" placeholder="Action, Adventure"
                    value="{{ old('Genre') }}">
                @error('Genre')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Released" class="inline-block text-lg mb-2">
                    Released
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Released" placeholder="06 Feb 2023"
                    value="{{ old('Released') }}">
                @error('Released')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Rated" class="inline-block text-lg mb-2">
                    Rated
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Rated" placeholder="PG-13"
                    value="{{ old('Rated') }}">
                @error('Rated')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Director" class="inline-block text-lg mb-2">
                    Director
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Director" placeholder="Director Name"
                    value="{{ old('Director') }}">
                @error('Director')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Actors" class="inline-block text-lg mb-2">
                    Actors
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Actors" placeholder="Actors Names"
                    value="{{ old('Actors') }}">
                @error('Actors')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Language" class="inline-block text-lg mb-2">
                    Language
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Language" placeholder="EN, SP"
                    value="{{ old('Language') }}">
                @error('Language')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Runtime" class="inline-block text-lg mb-2">
                    Runtime
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Runtime" placeholder="2h 5m"
                    value="{{ old('Runtime') }}">
                @error('Runtime')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Image" class="inline-block text-lg mb-2">
                    Image
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="Image"
                    value="{{ old('Image') }}">
                @error('Image')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- <div class="mb-6">
                <label for="theatre_name" class="inline-block text-lg mb-2">
                    Theatres
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="theatre_name"
                    value="{{ old('theatre_name') }}">
                @error('theatre_name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div> --}}

            <div class="mb-6">
                <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-black">
                    Post Movie
                </button>
            </div>
        </form>
    </div>
</x-layout>


