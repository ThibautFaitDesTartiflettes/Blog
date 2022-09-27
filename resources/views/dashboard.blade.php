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
            </ul>
        </div>
        <div class="tab-content pb-16 md:mx-16" id="tabs-tabContent">
            <div class="tab-panel" id="tabs-ajout" role="tabpanel" aria-labelledby="tabs-ajout-tab">
                <h1>Je suis la tab ajout</h1>
            </div>
            <div class="tab-panel hidden" id="tabs-modif" role="tabpanel" aria-labelledby="tabs-modif-tab">
                <h1>Je suis la tab modif</h1>
            </div>
            <div class="tab-panel hidden" id="tabs-suppr" role="tabpanel" aria-labelledby="tabs-suppr-tab">
                <h1>Je suis la tab suppr</h1>
            </div>
        </div>
    </section>

    <script src="js/tabs.js"></script>
@endsection