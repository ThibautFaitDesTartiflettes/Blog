@extends('layouts.app')

@section('content')
    <div class="overflow-x-hidden bg-stone-900">
        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    @foreach ($posts as $post)
                    <div class="mt-6">
                        <div class="max-w-4xl px-10 py-6 mx-auto bg-stone-800 rounded-lg shadow-md">
                            <div class="flex items-center justify-between">
                                <span class="font-light text-gray-400">
                                    {{ $post->created_at->format('d M Y') }}
                                </span>
                                <a href="#"
                                    class="px-2 py-1 font-medium text-gray-50 bg-orange-600 rounded">{{ $post->category->name }}
                                </a>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="text-2xl font-medium text-gray-200">
                                    {{ $post->title }}
                                </a>
                                <p class="mt-2 text-gray-300">
                                    {{ Str::limit($post->content, 120) }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-4"><a href="{{ route('posts.show', $post) }}"
                                    class="text-sky-700 link-underline-sky">Lire plus</a>
                                <div><a href="{{ route('posts.show', $post) }}" class="flex items-center"><img
                                            src="https://tcpacy.fr/img/team/thibautMeslin.jpg"
                                            alt="avatar" class="hidden object-cover w-8 h-8 mx-3 rounded-full sm:block">
                                        <h1 class="text-gray-400">{{ $post->user->name }}</h1>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-8">
                        <div class="flex items-center justify-center">
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-500 bg-stone-800 rounded-md cursor-not-allowed">previous</a>
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-200 bg-stone-800 rounded-md hover:bg-orange-600">1</a>
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-200 bg-stone-800 rounded-md hover:bg-orange-600">2</a>
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-200 bg-stone-800 rounded-md hover:bg-orange-600">3</a>
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-200 bg-stone-800 rounded-md hover:bg-orange-600">Next</a>
                        </div>
                    </div>
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-medium text-gray-200">Auteurs</h1>
                        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-stone-800 rounded-lg shadow-md">
                            <ul class="-mx-4">
                                <li class="flex items-center">
                                    <img
                                        src="https://tcpacy.fr/img/team/thibautMeslin.jpg"
                                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p>
                                        <a href="#" class="mx-1 font-bold text-gray-300">Thibaut Meslin</a>
                                        <span class="ml-7 text-sm font-light text-gray-400">Created 69 Posts</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-medium text-gray-200">Catégories</h1>
                        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-stone-800 rounded-lg shadow-md">
                            <ul class="list-disc ml-5 text-gray-300">
                                <li>
                                    <a href="#" class="text-gray-300">AWS</a>
                                </li>
                                <li class="mt-2">
                                    <a href="#" class="text-gray-300">Laravel</a>
                                </li>
                                <li class="mt-2">
                                    <a href="#" class="text-gray-300">Vue</a>
                                </li>
                                <li class="mt-2">
                                    <a href="#" class="text-gray-300">Design</a>
                                </li>
                                <li class="mt-2">
                                    <a href="#" class="text-gray-300">Django</a>
                                </li>
                                <li class="mt-2">
                                    <a href="#" class="text-gray-300">PHP</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-medium text-gray-200">Post récent</h1>
                        <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-stone-800 rounded-lg shadow-md">
                            <div class="flex items-center justify-center"><a href="#"
                                    class="px-2 py-1 text-sm text-gray-50 bg-orange-600 rounded">Laravel</a>
                            </div>
                            <div class="mt-4"><a href="#" class="text-lg font-medium text-gray-200">Build
                                    Your New Idea with Laravel Freamwork.</a></div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center"><img
                                        src="https://tcpacy.fr/img/team/thibautMeslin.jpg"
                                        alt="avatar" class="object-cover w-8 h-8 rounded-full">
                                        <a href="#" class="mx-3 text-sm text-gray-400 hover:underline">Thibaut Meslin</a>
                                </div>
                                <span class="text-sm font-light text-gray-400">Jun 1, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection