<div class="flex flex-row items-center justify-center space-x-4">
    <h2 class="text-lg lg:text-2xl font-bold text-white">Ratings</h2>
    <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline text-white lg:text-2xl">{{$ratingcount}}</a>
</div>


<div class="flex flex-col justify-center items-center space-y-2 mx-auto">
    {{-- <span class="text-gray-400 text-2xl pr-1">Rate:</span> --}}

    <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white"></p>

    <div class="flex items-center">
        <div class="flex">
            <span class="cursor-pointer" id="star1"><i class="fa-solid fa-star text-slate-300 "></i></span>
            <span class="cursor-pointer" id="star2"><i class="fa-solid fa-star text-slate-300"></i></span>
            <span class="cursor-pointer" id="star3"><i class="fa-solid fa-star text-slate-300"></i></span>
            <span class="cursor-pointer" id="star4"><i class="fa-solid fa-star text-slate-300"></i></span>
            <span class="cursor-pointer" id="star5"><i class="fa-solid fa-star text-slate-300"></i></span>
          </div>
        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">{{number_format($averagerating, 2)}}</p>
    </div>


    <form action="/ratings" method="POST">
        @csrf
        <input type="hidden" name="rating" id="rating">
        <Input type="hidden" name="movie_listings_id" value="{{ $movie->id }}">
        <button type="submit"
        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded focus:ring-4 focus:ring-primary-200  focus:ring-primary-900 hover:bg-primary-800">
        Submit
    </button>
    </form>

  </div>

  <script>
    const stars = document.querySelectorAll('.flex > span > i');

stars.forEach((star, i) => {
  star.addEventListener('click', () => {
    for(let j=0; j<=i; j++) {
      stars[j].classList.add('text-yellow-400');
    }
    for(let j=i+1; j<stars.length; j++) {
      stars[j].classList.remove('text-yellow-400');
    }
    document.getElementById('rating').value = i+1;
  });
});
  </script>