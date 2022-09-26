@extends('layouts.app')

@section('content')
<section class="text-gray-300 bg-stone-900 body-font">
  <div class="flex items-center justify-center w-full min-h-[85vh] px-5">
    <div class="w-1/2">
        <div class="flex flex-col items-center justify-center">
            <div class="text-center w-2/3 sm:pr-8 sm:py-8">
                <h1 class="title-font text-2xl text-gray-200 font-medium mb-5">Connexion</h1>
                @if (Session::has('refused'))
                    <div class="mx-auto mb-5 max-w-sm flex overflow-hidden bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-center w-12 bg-red-500">
                            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                            </svg>
                        </div>
                        <div class="px-4 py-2 mx-auto">
                            <div class="mx-3">
                                <span class="font-semibold text-red-500">Erreur</span>
                                <p class="text-sm text-gray-600">
                                Identifiant ou mot de passe incorrect
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('connect') }}" method="post">
                    @csrf
                    <div class="relative">
                        <input required name="name" type="text" id="floating_outlined" class="mb-5 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " />
                        <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Login</label>
                    </div>
                    <div class="relative">
                        <input required name="password" type="password" id="floating_outlined" class="mb-5 block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-300 bg-stone-800 rounded-lg border border-stone-300 appearance-none focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " />
                        <label for="floating_outlined" class="absolute text-sm text-gray-300 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-stone-800 px-2 peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Mot de passe</label>
                    </div>
                    <button class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-md font-medium text-gray-200 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400">
                        <span class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-stone-900 rounded-md">
                        Se connecter
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="w-1/2 flex items-center justify-center p-5">
        <img src="img/unDraw/login.svg" alt="Login">
    </div>
  </div>
</section>
@endsection