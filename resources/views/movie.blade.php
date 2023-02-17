<?php
$genre = $movie->Genre;

$genres = explode(',', $genre);
?>

<x-layout>

    <div class="p-6 md:p-12 text-center relative overflow-hidden bg-no-repeat bg-cover bg-center"
        style="background-image: url({{ $movie->Image ? asset('storage/' . $movie->Image) : asset('images/coming-soon.png') }}); height: 100vh;">
        <div class="absolute top-0  right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed bg-black opacity-80">
            <div class="flex flex-col justify-end pb-48 px-12 items-center h-full space-y-8 md:space-y-0  md:pb-24">
                <div
                    class="flex  max-w-7xl flex-col md:flex-row justify-between space-y-8 md:space-y-0 text-white w-full">
                    <div class="flex flex-col items-center space-y-8 md:space-y-12 font-serif md:mr-24">
                        <div class="hidden md:block">
                            <p class="font-light">Runtime</p>
                            <p class="text-white text-4xl font-bold uppercase">{{ $movie->Runtime }}</p>
                        </div>
                        <div class="hidden md:block">
                            <p class="font-light">Director</p>
                            <p class="text-white text-4xl font-bold uppercase">{{ $movie->Director }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-8 md:space-y-12 font-serif md:mr-16">
                        <div class="hidden md:block">
                            <p class="font-light">Genre</p>
                            <p class="text-white text-4xl font-bold uppercase">{{ $genres[0] }}</p>
                        </div>
                        <div class="hidden md:block">
                            <p class="font-light">Actors</p>
                            <p class="text-white text-4xl font-bold uppercase text-center mx-auto">{{ $movie->Actors }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/3">
                    <div class="text-white pt-8 md:pt-48 max-w-4xl mx-auto">
                        <h2 class="font-serif font-semibold text-4xl md:text-6xl mb-4 w-full animate__animated animate__fadeInDown"> {{ $movie->Title }} </h2>
                        <p class="font-light mb-6 mx-auto max-w-3xl animate__animated animate__fadeInUp"> {{ $movie->Plot }} </p>
                        <a class="inline-block px-7 py-3 mb-1 bg-blue-500 font-medium text-sm leading-snug uppercase rounded hover:font-bold hover:bg-opacity-9 focus:outline-none focus:ring-0 transition duration-150 ease-in-out animate__animated animate__fadeInUp"
                            href="#!" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light">Book
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $movie->Title }}

    <div class="mx-auto my-12 sm:w-4/5 md:w-3/5 lg:w-2/5 xl:w-1/3 px-6">
        <h2 class="text-2xl font-bold text-white mb-6 text-center">Cinemas</h2>
        @foreach ($theatres as $theatre)
            <div class="flex justify-center mb-6">
                <div class="block p-6 rounded-lg shadow-lg bg-slate-900 w-full space-y-4">
                    <h5 class="text-white text-xl leading-tight font-medium mb-2">{{ $theatre->theatre_name }}</h5>
                    <div class="flex flex-row items-center space-x-2 my-2">
                        <i class="fas fa-map-marker-alt text-gray-300"></i>
                        <p class="text-gray-300 text-base">{{ $theatre->theatre_location }}</p>
                    </div>
                    <div class="flex flex-row items-center space-x-2 my-2">
                        <i class="fas fa-link text-gray-300"></i>
                        <p class="text-gray-300 text-base"><a href="{{ $theatre->theatre_website }}" target="_blank">{{ $theatre->theatre_website }}</a></p>
                    </div>
                    <div class="flex flex-wrap mt-4">
                        @foreach ($theatre->dates as $date)
                            <span class="inline-block py-4 px-4 leading-none text-center whitespace-nowrap align-baseline font-bold bg-slate-600 text-white rounded mr-2 mb-2">{{ $date->date }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>

    {{-- 
                <p class="text-white font-bold "> {{ $theatre->theatre_name }} </p>
                <p class="text-white font-bold "> {{ $theatre->theatre_location }} </p>
                <p class="text-white font-bold "> {{ $theatre->theatre_website }} </p> --}}
    </div>

    <x-ratings :movie="$movie" :averagerating="$averagerating" :ratingcount="$ratingcount" />

    <x-reviews :movie="$movie" :review="$reviews" />



</x-layout>
