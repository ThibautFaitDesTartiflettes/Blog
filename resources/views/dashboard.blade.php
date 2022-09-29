@extends('layouts.app')

@section('content')
    <section class="text-gray-300 bg-stone-900 min-h-[85vh] body-font">
        <div class="flex w-full justify-center mb-5">
            <ul class="nav nav-tabs flex flex-row content-center flex-wrap list-none border-b-0 mb-5 mt-8" id="tabs-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#ajout" class="nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-orange-600 transition duration-300 ease-in-out focus:border-orange-600 border-orange-600" 
                        id="tabs-ajout-tab" data-bs-toggle="pill" data-bs-target="#tabs-ajout" role="tab" 
                        aria-controls="tabs-ajout" aria-selected="true">Ajouter</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#modif" class="nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-orange-600 transition duration-300 ease-in-out focus:border-orange-600" 
                        id="tabs-modif-tab" data-bs-toggle="pill" data-bs-target="#tabs-modif" role="tab" 
                        aria-controls="tabs-modif" aria-selected="true">Modifier</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#suppr" class="nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-orange-600 transition duration-300 ease-in-out focus:border-orange-600" 
                        id="tabs-suppr-tab" data-bs-toggle="pill" data-bs-target="#tabs-suppr" role="tab" 
                        aria-controls="tabs-suppr" aria-selected="true">Supprimer</a>
                </li>
                <li class="border-l-2 border-orange-600 nav-item" role="presentation">
                    <a href="#cat" class="nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-orange-600 transition duration-300 ease-in-out focus:border-orange-600" 
                        id="tabs-cat-tab" data-bs-toggle="pill" data-bs-target="#tabs-cat" role="tab" 
                        aria-controls="tabs-cat" aria-selected="true">Catégories</a>
                </li>
            </ul>
        </div>
        @if (Session::has('Article'))
            <div class="w-full flex items-center justify-center mb-10 mx-auto">
                <div class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center w-12 bg-emerald-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                        </svg>
                    </div>

                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-emerald-500">Succès</span>
                            <p class="text-sm text-gray-600">{{ Session::get('Article') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="tab-content pb-16 mx-5 md:mx-16" id="tabs-tabContent">
            <div class="tab-panel" id="tabs-ajout" role="tabpanel" aria-labelledby="tabs-ajout-tab">
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="grid overflow-hidden grid-cols-1 md:grid-cols-2 grid-rows-4 gap-4">
                        <div class="box sm:h-18">
                            <div class="relative">
                                <input required name="title" type="text" id="floating_outlined" class="mt-4 h-16 mb-5 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " />
                                <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Titre</label>
                            </div>
                        </div>
                        <div class="box md:row-start-2 sm:h-18">
                            <label for="category" class="text-gray-300">Catégorie</label>
                            <select required id="category" name="category" class="bg-stone-800 w-full h-1/2 mt-5 border border-gray-300 text-gray-300 text-sm rounded-md block p-2.5">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="box md:row-start-3 sm:h-18">
                            <label class="text-gray-300" for="avatar">Image</label>
                            <input required id="avatar" name="avatar" type="file" class="block mt-5 w-full h-1/2 text-md text-gray-300 file:mr-5 file:py-2 file:px-6 file:rounded-full file:border-1 file:border-stone-300 file:text-md file:bg-stone-800 file:text-gray-300 hover:file:cursor-pointer">
                        </div>
                        <div class="box md:row-start-1 md:row-span-3 sm:h-18">
                            <div class="relative">
                                <textarea required name="content" type="text" id="floating_outlined" class="mt-4 mb-5 md:h-96 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer resize-none md:resize-y" placeholder=" "></textarea>
                                <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Contenu</label>
                            </div>
                        </div>
                        <div class="box md:col-span-2">
                            <button type="submit" class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-md font-medium text-gray-200 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400">
                                <span class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-stone-900 rounded-md">
                                    Enregistrer
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-panel hidden" id="tabs-modif" role="tabpanel" aria-labelledby="tabs-modif-tab">
                <select onchange="selectFun()" id="select_modif" name="select_id" class="bg-stone-800 w-full h-1/2 my-5 border border-gray-300 text-gray-300 text-sm rounded-md block p-2.5">
                    @foreach ($posts as $pst)
                        <option value="{{ $pst->id }}" {{ $selectedPost->id == $pst->id ? 'selected' : '' }}>{{ $pst->title }}</option>
                    @endforeach
                </select>
                <form class="mt-14" action="{{ route('posts.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <input type="hidden" name="id" value="{{ $selectedPost->id }}">
                    <div class="grid overflow-hidden grid-cols-1 md:grid-cols-2 grid-rows-4 gap-4">
                        <div class="box sm:h-18">
                            <div class="relative">
                                <input value="{{ $selectedPost->title }}" required name="title" type="text" id="floating_outlined" class="mt-4 h-16 mb-5 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " />
                                <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Titre</label>
                            </div>
                        </div>
                        <div class="box md:row-start-2 sm:h-18">
                            <label for="category" class="text-gray-300">Catégorie</label>
                            <select required id="category" name="category" class="bg-stone-800 w-full h-1/2 mt-5 border border-gray-300 text-gray-300 text-sm rounded-md block p-2.5">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $selectedPost->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="box md:row-start-3 sm:h-18">
                            <label class="text-gray-300" for="avatar">Image</label>
                            <input id="avatar" name="avatar" type="file" class="block mt-5 w-full h-1/2 text-md text-gray-300 file:mr-5 file:py-2 file:px-6 file:rounded-full file:border-1 file:border-stone-300 file:text-md file:bg-stone-800 file:text-gray-300 hover:file:cursor-pointer">
                        </div>
                        <div class="box md:row-start-1 md:row-span-3 sm:h-18">
                            <div class="relative">
                                <textarea required name="content" type="text" id="floating_outlined" class="mt-4 mb-5 md:h-96 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer resize-none md:resize-y" placeholder=" ">{{ $selectedPost->content }}</textarea>
                                <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Contenu</label>
                            </div>
                        </div>
                        <div class="box md:col-span-2">
                            <button type="submit" class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-md font-medium text-gray-200 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400">
                                <span class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-stone-900 rounded-md">
                                    Modifier
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-panel hidden" id="tabs-suppr" role="tabpanel" aria-labelledby="tabs-suppr-tab">
                <form class="mt-14" action="{{ route('posts.destroy') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                    <select id="select_suppr" name="select_id" class="bg-stone-800 w-full h-1/2 my-5 border border-gray-300 text-gray-300 text-sm rounded-md block p-2.5">
                        @foreach ($posts as $pst)
                            <option value="{{ $pst->id }}" {{ $selectedPost->id == $pst->id ? 'selected' : '' }}>{{ $pst->title }}</option>
                        @endforeach
                    </select>
                    <div class="box md:col-span-2">
                        <button type="submit" class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-md font-medium text-gray-200 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400">
                            <span class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-stone-900 rounded-md">
                                Supprimer
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="tab-panel hidden" id="tabs-suppr" role="tabpanel" aria-labelledby="tabs-cat-tab">
                <div class="grid w-full overflow-hidden grid-cols-2 grid-rows-4 gap-4 min-h-[70vh]">
                    @if (!Session::has('selectedCat'))
                        <div class="box flex justify-center items-center">
                            <h1 class="text-2xl font-semibold">Ajouter une catégorie</h1>
                        </div>
                        <div class="box w-full row-start-2 row-span-4 flex flex-col">
                            <form class="mx-12" action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="relative">
                                    <input required name="name" type="text" id="floating_outlined" class="mt-4 h-16 mb-5 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " />
                                    <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Titre</label>
                                </div>
                                <div class="box md:col-span-2">
                                    <button type="submit" class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-md font-medium text-gray-200 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400">
                                        <span class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-stone-900 rounded-md">
                                            Ajouter
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="box flex justify-center items-center">
                            <h1 class="text-2xl font-semibold">Modifier une catégorie</h1>
                        </div>
                        <div class="box w-full row-start-2 row-span-4 flex flex-col">
                            <form class="mx-12" action="{{ route('categories.update') }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="id" value="{{ Session::get('selectedCat')->id }}">
                                <div class="relative">
                                    <input required value="{{ Session::get('selectedCat')->name }}" name="name" type="text" id="floating_outlined" class="mt-4 h-16 mb-5 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " />
                                    <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Titre</label>
                                </div>
                                <div class="box md:col-span-2">
                                    <button type="submit" class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-md font-medium text-gray-200 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400">
                                        <span class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-stone-900 rounded-md">
                                            Modifier
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div class="box row-span-5">
                        <table class="bg-stone-800 text-gray-900 w-full shadow-none">
                            <thead>
                                <tr>
                                    <th class="bg-stone-800 text-gray-200 p-3">Nom</th>
                                    <th class="bg-stone-800 text-gray-200 p-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                    <tr class="bg-stone-800 text-gray-300 text-center">
                                        <td class="p-2 border-t border-black">{{ $cat->name }}</td>
                                        <td class="p-2 border-t border-black">
                                            <form action="{{ route('categories.show') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $cat->id }}">
                                                <button type="submit" name="submit" value="modify" class="w-1/3 bg-orange-600 text-white font-bold py-2 px-4 rounded">Modifier</button>
                                                <button type="submit" name="submit" value="delete" class="w-1/3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/tabs.js"></script>
    <script type="text/javascript">    
        function selectFun() {
            var select = document.getElementById("select_modif");
            var selected = select.options[select.selectedIndex].value;
            window.location.href = "{{ route('Admin') }}" + "?id=" + selected;
        };
    </script>
@endsection