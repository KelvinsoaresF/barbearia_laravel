@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main_layout')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white rounded-xl shadow-md overflow-hidden p-6">
        <!-- Imagem do serviço -->
        <img src="teste.jpeg" alt="Corte" class="w-full h-60 object-cover rounded">

        <h1 class="text-2xl font-bold mt-4">{{ $service->name }}</h1>
        <p class="text-gray-600 mt-2">{{ $service->description }}</p>
        <p class="text-green-600 font-bold mt-2">R${{ $service->price }}</p>
        <p class="text-gray-600 mt-2">{{ $service->duration }} minutos</p>

        <form class="mt-6" method="POST" action="{{ route('appointment_service', ['id' => $service->id]) }}">
            <!-- Data -->
            @csrf
            <label class="block mt-4">
                Data:
                <select name="date" id="date" class="w-full border rounded px-2 py-1 mt-1">
                    <option value="">Selecione uma data</option>
                    @foreach ($availabilities as $date => $slots)
                        <option value="{{ $date }}">{{ Carbon::parse($date)->format('d/m/Y') }}</option>
                    @endforeach
                </select>
            </label>

            <label class="block mt-4">
                Horário:
                <select name="timeslot" id="timeslot" class="w-full border rounded px-2 py-1 mt-1">
                    <option value="">Selecione um horário</option>
                </select>
            </label>

            <button type="submit"
                class="mt-6 w-full hover:cursor-pointer bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors duration-200">
                Confirmar Agendamento
            </button>
        </form>
    </div>

    <script>
        const availabilities = @json($availabilities);

        const dataSelect = document.getElementById('date');
        const timeslotSelect = document.getElementById('timeslot');

        dataSelect.addEventListener('change', function() {
            const selectedDate = this.value;

            timeslotSelect.innerHTML = '<option value="">Selecione um horário</option>';

            if (selectedDate && availabilities[selectedDate]) {
                availabilities[selectedDate].forEach(slot => {
                    const option = document.createElement('option');
                    option.value = slot;
                    option.textContent = slot.substring(0, 5);
                    timeslotSelect.appendChild(option);
                });
            }
        })
    </script>
@endsection
