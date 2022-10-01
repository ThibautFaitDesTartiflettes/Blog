@extends('layouts.app')

@section('content')
    <div class="overflow-x-hidden bg-stone-900 min-h-[90vh]">
        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    @if ($posts->isNotEmpty())
                        @foreach ($posts as $post)
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-stone-800 rounded-lg shadow-md">
                                <div class="flex items-center justify-between">
                                    <span class="font-light text-gray-400">
                                        {{ $post->created_at->format('d M Y') }}
                                    </span>
                                    @if (isset($post->category->id))
                                    <a href="{{ route('posts.index', $post->category->id) }}"
                                        class="px-2 py-1 font-medium text-gray-50 bg-orange-600 rounded">{{ $post->category->name }}
                                    </a>
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <a class="text-2xl font-medium text-gray-200">
                                        {{ $post->title }}
                                    </a>
                                    <p class="mt-2 text-gray-300">
                                        {!! preg_replace("/<br\W*?\/>/", "\n", Str::limit($post->content, 120)) !!}
                                    </p>
                                </div>
                                <div class="flex items-center justify-between mt-4">
                                    <a href="{{ route('posts.show', $post) }}"
                                        class="text-sky-700 link-underline-sky">Lire plus</a>
                                    <div>
                                        <a class="flex items-center"><img
                                                src="https://tcpacy.fr/img/team/thibautMeslin.jpg"
                                                alt="avatar" class="hidden object-cover w-8 h-8 mx-3 rounded-full sm:block">
                                            <h1 class="text-gray-400">{{ $post->user->name }}</h1>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="w-full h-full flex flex-col justify-center items-center">
                        <img class="w-64 h-64" src="img/icons/ghost.svg" alt="Ghost">
                        <p class="text-center mt-5 text-gray-300 text-lg">Aucun article pour le moment</p>
                    </div>
                    @endif
                    <div class="mt-8">
                        <div class="flex items-center justify-center">
                            {!! $posts->links('pagination::tailwind') !!}
                        </div>
                    </div>
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-medium text-gray-200">Auteur</h1>
                        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-stone-800 rounded-lg shadow-md">
                            <ul class="-mx-4">
                                <li class="flex items-center">
                                    <img
                                        src="https://tcpacy.fr/img/team/thibautMeslin.jpg"
                                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p>
                                        <a href="#" class="mx-1 font-bold text-gray-300">Thibaut Meslin</a>
                                        <span class="ml-7 text-sm font-light text-gray-400">Created {{ $posts->total() }} Posts</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-medium text-gray-200">Catégories</h1>
                        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-stone-800 rounded-lg shadow-md">
                            <ul class="list-disc ml-5 text-gray-300">
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $cat)
                                    <li class="mb-3">
                                        <a href="{{ route('posts.index', $cat->id) }}" class="hover:ml-1 text-gray-300 hover:bg-orange-600 hover:py-2 hover:px-3 hover:rounded duration-200 ease-in-out">{{ $cat->name }}</a>
                                    </li>
                                    @endforeach
                                @else
                                <div class="w-full h-full flex flex-col justify-center items-center">
                                    <img class="w-64 h-64" src="img/icons/ghost.svg" alt="Ghost">
                                    <p class="text-center mt-5 text-gray-300 text-lg">Aucune catégorie pour le moment</p>
                                </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-medium text-gray-200">Statistiques</h1>
                        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-stone-800 rounded-lg shadow-md">
                            <ul class="ml-2 text-gray-300">
                                <li class="flex items-center mb-3">
                                    <img class="w-6 h-6" src="img/icons/eye.svg" alt="Eye">
                                    <span class="ml-2"> : {{ $posts->sum('views') }}</span>
                                </li>
                                <li class="flex items-center mb-3">
                                    <img class="w-6 h-6" src="img/icons/likes.svg" alt="Likes">
                                    <span class="ml-2"> : {{ $posts->sum('likes') }}</span>
                                </li>
                                <li class="flex items-center mb-3">
                                    <img class="w-6 h-6" src="img/icons/message.svg" alt="Message">
                                    <span class="ml-2"> : {{ $comments }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection