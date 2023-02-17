<x-layout>

    <div class="bg-gray-50 border border-gray-200 p-10 max-w-lg mx-auto mt-24 mb-48">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Add Theatres
            </h2>
        </header>

        <form action="/theatres" method="POST">
            @csrf
            <div class="mb-6">
                <label for="theatre_name" class="inline-block text-lg mb-2">
                    Thetare Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="theatre_name"
                    value="{{ old('theatre_name') }}">
                @error('theatre_name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="theatre_location" class="inline-block text-lg mb-2">
                    Location
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="theatre_location"
                    value="{{ old('theatre_location') }}">
                @error('theatre_location')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="theatre_website" class="inline-block text-lg mb-2">
                    Website
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="theatre_website"
                    value="{{ old('theatre_website') }}">
                @error('theatre_website')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="theatre_dates" class="inline-block text-lg mb-2">
                    Dates
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="theatre_dates"
                    value="{{ old('theatre_dates') }}">
                @error('theatre_dates')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <div class="mb-6">
                <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-black">
                    Add Theatre
                </button>
            </div>
            <Input type="hidden" name="movie_listings_id" value="{{ $movie_id }}">
        </form>
    </div>
</x-layout>
