@props(['genrecsv'])
<?php
$genres = explode(',', $genrecsv);
?>


<nav class="w-full mt-4">
    <ol class="list-reset flex genre">
        @foreach ($genres as $genre)
            <li><a href="/?genre={{ $genre }}" class="text-xs text-gray-200 bg-gray-500 p-1 pl-2 pr-2">{{$genre}}</a></li>
            &nbsp; {{ $loop->last ? '' : '/' }} &nbsp;
        @endforeach
    </ol>
</nav>
