@extends('layouts.main_layout')

@section('content')
    <div class="container mx-auto py-8 max-w-lg">
        <h1 class="text-2xl text-center font-bold mb-6">Adicionar Serviço</h1>

        {{-- @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif --}}

        <form action="#" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow-md">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nome do Serviço</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500">
                {{-- @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Preço</label>
                <input type="text" name="price" value="{{ old('price') }}"
                    class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500">
                {{-- @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-4">
                {{-- <label class="block text-gray-700">Horário</label>
                <input type="text" name="time" value="{{ old('time') }}" placeholder="15:00 - 16:00"
                    class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500"> --}}
                {{-- @error('time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Imagem (opcional)</label>
                <input type="file" name="image"
                    class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500">
                {{-- @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors duration-200">
                Cadastrar Serviço
            </button>
        </form>
    </div>
@endsection
