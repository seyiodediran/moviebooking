<x-layout>

    <div class="bg-gray-50 border border-gray-200 p-10 max-w-lg mx-auto mt-24 mb-48">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Add Movie
            </h2>
        </header>

        <form action="/movie/{{ $movie->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="Title" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Title"
                    value="{{ $movie->Title }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Plot"
                    value="{{ $movie->Plot }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Year"
                    value="{{ $movie->Year }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Genre"
                    value="{{ $movie->Genre }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Released"
                    value="{{ $movie->Released }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Rated"
                    value="{{ $movie->Rated }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Director"
                    value="{{ $movie->Director }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Actors"
                    value="{{ $movie->Actors }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Language"
                    value="{{ $movie->Language }}">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Runtime"
                    value="{{ $movie->Runtime }}">
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
                    value="{{ $movie->Image }}">

                <div class="w-full p-1 md:p-2">
                    <div class="mb-1">
                        <p class="text-gray-700 text-xs">CURRENT IMAGE</p>
                    </div>
                    <img alt="gallery" class="object-cover object-center w-1/3 h-auto rounded-lg"
                        src={{ $movie->Image ? asset('storage/' . $movie->Image) : asset('images/coming-soon.png') }} />
                </div>
                @error('Image')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6 mt-6">
                <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-black">
                    Post Movie
                </button>
            </div>
</x-layout>
