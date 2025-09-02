<header class="bg-green-500 p-4 flex justify-between items-center">


    {{-- @svg('ei-navicon', 'w-10 h-10 hover:cursor-pointer text-white') --}}


    <a href="{{ route('home') }}">
        <h1 class="text-4xl font-bold text-white">Barbearia</h1>
    </a>

    <ul class="hidden md:flex space-x-6 items-center justify-center text-white">
        <li><a href="{{ route('home') }}" class="hover:text-gray-200">Home</a></li>
        <li><a href="#services" class="hover:text-gray-200">Serviços</a></li>

        @auth
            <li><a href="#about F" class="hover:text-gray-200">Agendamentos</a></li>
        @endauth

        <li><a href="#contact" class="hover:text-gray-200">Contato</a></li>
    </ul>


    <div class="space-x-4">

        @auth
        <div class="inline-flex items-center space-x-4">
            <span class="font-semibold text-3xl text-white">Olá, {{ Auth::user()->name }}!</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg font-semibold shadow hover:bg-red-700 transition">
                    Logout
                </button>
            </form>

        </div>
        @endauth

        <!-- Se o usuário não está logado -->
        @guest
            <a href="{{ route('login_view') }}"
                class="bg-white text-green-600 px-4 py-2 rounded-lg font-semibold shadow hover:bg-gray-100 transition">
                Login
            </a>
            <a href="{{ route('register_view') }}"
                class="bg-green-700 text-white px-4 py-2 rounded-lg font-semibold shadow hover:bg-green-800 transition">
                Registrar
            </a>
        @endguest
    </div>
</header>
