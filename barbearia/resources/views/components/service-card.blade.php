{{-- @props([
    'image' => 'https://via.placeholder.com/150',
    'name' => 'Serviço',
    'price' => 'R$ 0,00',
    'time' => '00:00 - 00:00'
]) --}}

<div class="max-w-xs bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
    {{-- <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-40 object-cover"> --}}
    <img src="teste.jpeg" alt="nome" class="w-full h-40 object-cover">
    <div class="p-4">
        {{-- <h3 class="text-lg font-semibold text-gray-800">{{ $name }}</h3> --}}
        <h3 class="text-lg font-semibold text-gray-800">corte</h3>
        {{-- <p class="text-gray-600 mt-2">{{ $time }}</p> --}}
        <p class="text-gray-600 mt-2">15:00 - 16:00</p>
        {{-- <p class="text-green-600 font-bold mt-2">{{ $price }}</p> --}}
        <p class="text-green-600 font-bold mt-2">R$16,00</p>

        <a href="{{ route('service_show_view') }}">
            <button class="mt-4 w-full hover:cursor-pointer bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors duration-200">
                Agendar
            </button>
        </a>
    </div>
</div>
