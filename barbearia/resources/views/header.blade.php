<header class="bg-green-500 p-4 flex justify-between items-center">


    {{-- @svg('ei-navicon', 'w-10 h-10 hover:cursor-pointer text-white') --}}


    <a href="{{ route('home') }}">
        <h1 class="text-4xl font-bold text-white">Barbearia</h1>
    </a>

    <ul class="hidden md:flex space-x-6 items-center justify-center text-white">
        <li><a href="{{ route('home') }}" class="hover:text-gray-200">Home</a></li>
        <li><a href="#services" class="hover:text-gray-200">Serviços</a></li>
        <li><a href="#about F" class="hover:text-gray-200">Historico</a></li>
        <li><a href="#contact" class="hover:text-gray-200">Contato</a></li>
    </ul>


    <div class="space-x-4"> F
        <a href="{{ route('login_view') }}"
            class="bg-white text-green-600 px-4 py-2 rounded-lg font-semibold shadow hover:bg-gray-100 transition">
            Login
        </a>
        <a href="{{ route('register_view') }}"
            class="bg-green-700 text-white px-4 py-2 rounded-lg font-semibold shadow hover:bg-green-800 transition">
            Registrar
        </a>
    </div>
</header>
