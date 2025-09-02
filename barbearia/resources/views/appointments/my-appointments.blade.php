@extends('layouts.main_layout')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Meus Agendamentos</h1>

        @if ($appointments->isEmpty())
            <p>Você ainda não tem agendamentos.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">Serviço</th>
                        <th class="border px-4 py-2">Data</th>
                        <th class="border px-4 py-2">Horário</th>
                        <th class="border px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td class="border px-4 py-2">{{ $appointment->service->name ?? '—' }}</td>
                            <td class="border px-4 py-2">{{ $appointment->availability->date ?? $appointment->date }}</td>
                            <td class="border px-4 py-2">{{ $appointment->availability->timeslot ?? '—' }}</td>
                            <td class="border px-4 py-2 capitalize">{{ $appointment->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
