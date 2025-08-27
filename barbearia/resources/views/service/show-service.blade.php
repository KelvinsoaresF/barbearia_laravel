@extends('layouts.main_layout')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white rounded-xl shadow-md overflow-hidden p-6">
    <!-- Imagem do serviço -->
    <img src="teste.jpeg" alt="Corte" class="w-full h-60 object-cover rounded">

    <h1 class="text-2xl font-bold mt-4">Corte Masculino</h1>
    <p class="text-gray-600 mt-2">Corte detalhado com lavagem e finalização.</p>
    <p class="text-green-600 font-bold mt-2">R$16,00</p>
    <p class="text-gray-600 mt-2">Duração: 1:30</p>

    <form class="mt-6">
        <!-- Data -->
        <label class="block mt-4">
            Data:
            <select class="w-full border rounded px-2 py-1 mt-1">
                <option value="">Selecione uma data</option>
                <option value="2025-08-27">27/08/2025</option>
                <option value="2025-08-28">28/08/2025</option>
                <option value="2025-08-29">29/08/2025</option>
                <option value="2025-08-30">30/08/2025</option>
            </select>
        </label>

        <label class="block mt-4">
            Horário:
            <select class="w-full border rounded px-2 py-1 mt-1">
                <option value="">Selecione um horário</option>
                <option value="09:00">09:00</option>
                <option value="10:30">10:30</option>
                <option value="14:00">14:00</option>
                <option value="15:30">15:30</option>
            </select>
        </label>

        <button type="submit" class="mt-6 w-full hover:cursor-pointer bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors duration-200">
            Confirmar Agendamento
        </button>
    </form>
</div>
@endsection
