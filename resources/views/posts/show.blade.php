@extends('layouts.app')

@section('content')
<section class="text-gray-300 bg-stone-900 body-font">
  <div class="container px-5 py-12 mx-auto flex flex-col">
    <div class="lg:w-5/6 mx-auto h-full">
      <div class="rounded-lg h-96 md:h-[26rem] overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="https://mobimg.b-cdn.net/v3/fetch/87/87c93aa33275b4c8c73637ad3fbee836.jpeg?w=1470&r=0.5625">
      </div>
      <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          <div class="w-20 h-20 inline-flex items-center justify-center">
            <img class="rounded-full" src="https://tcpacy.fr/img/team/thibautMeslin.jpg" alt="Profile picture">
          </div>
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-gray-300 text-lg">{{ $post->user->name }}</h2>
            <div class="w-12 h-1 bg-orange-600 rounded mt-2 mb-4"></div>
            <p class="text-base text-gray-400">{{ $post->user->email }}</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <h1 class="title-font text-4xl text-gray-200 mb-16">{{ $post->title }}</h1>
          <p class="leading-relaxed text-lg mb-4 text-gray-300">{{ $post->content }}<p>
        </div>
      </div>
      <div class="w-full h-[2px] mt-10 bg-orange-600"></div>
      <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          <h1 class="title-font text-2xl text-gray-200 font-medium mb-10">Laisser un commentaire</h1>
          <form action="{{ route('posts.comment') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="relative">
              <input required name="author" type="text" id="floating_outlined" class="mb-5 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " />
              <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nom et Prénom</label>
            </div>
            <div class="relative">
              <textarea required name="comment" type="text" id="floating_outlined" class="mb-5 h-52 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer resize-y" placeholder=" "></textarea>
              <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Commentaire</label>
            </div>
            <button class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-md font-medium text-gray-200 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400">
              <span class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-stone-900 rounded-md">
                Enregistrer
              </span>
            </button>
          </form>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
            @foreach ($comments as $comment)
                <div class="relative grid grid-cols-1 gap-4 p-4 my-10 border border-stone-300 rounded-lg bg-stone-800 shadow-lg">
                <div class="relative flex gap-4">
                    <img src="https://icons.iconarchive.com/icons/icons8/ios7/256/Holidays-Ghost-icon.png" class="relative rounded-lg -top-8 -mb-4 bg-stone-300 border border-stone-300 h-20 w-20" alt="" loading="lazy">
                    <div class="flex flex-col w-full">
                        <div class="flex flex-row justify-between">
                          <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ $comment->author }}</p>
                          <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                        </div>
                        <p class="text-gray-400 text-sm">{{ $comment->created_at->format('d M Y') }}, à {{ $comment->created_at->format('H:m') }}</p>
                    </div>
                    </div>
                <p class="-mt-4 text-gray-300">{!! $comment->comment !!}</p>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
  <button onclick="window.location.href='{{ route('posts.index') }}'" class="fixed z-90 bottom-20 right-6 border-0 w-10 h-10 rounded-full drop-shadow-md bg-orange-600 text-gray-300 text-xl font-bold">&#10005;</button>
</section>
@endsection