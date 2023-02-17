<x-layout>
    <div class="">

        <!-- Jumbotron -->
        <div class="p-12 text-center relative overflow-hidden bg-no-repeat bg-cover bg-center"
            style="background-image: url({{ asset('images/hero.jpeg') }}); height: 600px;">
            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="flex justify-center items-center h-full">
                    <div class="text-white pt-48 px-4 md:pt-0">
                        <h2 class="font-serif font-semibold text-6xl mb-4">Power Book II Ghost</h2>
                        <h4 class="font-semibold text-xl mb-6">Season 3 Premiere</h4>
                        <a class="inline-block px-7 py-3 mb-1 border-2 border-gray-200 text-gray-200 font-medium text-sm leading-snug uppercase rounded hover:border-black hover:font-bold hover:bg-black hover:text-white hover:bg-opacity-9 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                            href="#!" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light">Check
                            Locations</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
        
        <section class="overflow-hidden text-gray-700 mt-24 ">
            <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                <div class="flex flex-wrap  w-full flex-col -m-1 md:-m-2 md:flex-row">
                    @foreach ($movies as $movie)
                        <div class="flex flex-wrap mb-12 pb-8 w-full md:w-1/3 mx-auto md:48">
                            <div class="w-full p-1 md:p-2 relative bg-no-repeat bg-cover md:max-w-xs"
                                style="height: 500px; background-position: 50%;">
                                <img alt="gallery" class="object-cover object-center w-full h-full rounded-lg"
                                    src="{{ $movie->Image ? asset('storage/' . $movie->Image) : asset('images/coming-soon.png') }}">
                                <a href="/movie/{{ $movie->id }}">
                                    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed hover:bg-black opacity-20"></div>
                                </a>
                                <div class="md:hidden absolute bottom-0 w-full p-6 bg-gradient-to-t from-black to-transparent">
                                    <h4 class="font-medium leading-tight text-white text-2xl"><a href="/movie/{{ $movie->id }}">{{ $movie->Title }}</a></h4>
                                    <p class="font-light text-white">{{ $movie->Plot }}</p>
                                    {{-- <x-genre :genrecsv="$movie->Genre" /> --}}
                                        <a class="inline-block px-7 py-3 mt-6 bg-blue-500 text-white font-medium text-sm 
                                        leading-snug uppercase rounded hover:font-bold hover:bg-opacity-9 focus:outline-none 
                                        focus:ring-0 transition duration-150 ease-in-out"
                                            href="#!" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light">Book
                                            Now</a>
                                </div>
                            </div>
                            <div class="hidden md:block w-full p-2">
                                <h4 class="font-medium leading-tight text-white text-2xl"><a href="/movie/{{ $movie->id }}">{{ $movie->Title }}</a></h4>
                                <p class="font-light text-white">{{ Str::words($movie->Plot, 10, '... view more') }}</p>
                                <x-genre :genrecsv="$movie->Genre" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="mt-6 p-4 w-3/4 mx-auto">
            {{ $movies->links() }}
        </div>
    </div>


</x-layout>
