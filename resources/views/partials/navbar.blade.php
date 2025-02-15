<header class="text-gray-200 bg-stone-800 body-font">
    <div class="container mx-auto flex flex-wrap p-4 flex-col md:flex-row items-center md:justify-between">
        <a href="{{ route('posts.index') }}" class="flex title-font font-medium items-center text-gray-200 mb-4 md:mb-0">
            <span class="ml-3 text-xl">Thibaut Meslin</span>
        </a>
        <form action="{{ route('posts.search') }}" method="POST" class="flex items-center mb-4 md:mb-0">   
            @csrf
            <label for="simple-search" class="sr-only">Rechercher</label>
            <div class="relative w-full lg:w-96">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input name="search" type="text" id="simple-search" class="bg-stone-700 border border-stone-300 text-gray-200 text-sm rounded-lg block w-full pl-10 p-2.5" placeholder="Rechercher" required>
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-orange-600 rounded-lg border border-orange-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
        <nav class="flex flex-wrap items-center text-base justify-center cursor-pointer space-x-4">
            <a class="link link-underline" href="https://thibaut-meslin.fr">Portfolio</a>
            <a class="link link-underline" href="https://thibaut-meslin.fr/contact">Contactez-moi</a>
            @auth
                <div class="w-[2px] h-10 rounded-full bg-orange-600"></div>
                <a class="link link-underline" href="{{ route('Admin') }}">Dashboard</a>
                <a class="link link-underline" href="{{ route('logout') }}">Déconnexion</a>
            @endauth
        </nav>
    </div>
</header>