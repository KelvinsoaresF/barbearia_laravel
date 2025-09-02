@component('mail::message')
    # Confirmação de agendamento

    Olá

    Seu agendamento foi realizado com sucesso!

    Detalhes sobre o serviço:
    - **Serviço:** {{ $appointment->service->name }}
    - **Data:** {{ \Carbon\Carbon::parse($appointment->availability->date)->format('d/m/Y') }}
    - **Horário:** {{ $appointment->availability->timeslot }}

    @if ($booking->user)
        Reservado pelo usuário: **{{ $appointment->user->name }}** ({{ $appointment->user->email }})
    @else
        Reservado para o e-mail: **{{ $appointment->guest_email }}**
    @endif

    @component('mail::button', ['url' => route('service_show_view', $booking->service_id)])
        Ver serviço
    @endcomponent

    Obrigado,<br>
    {{ config('app.name') }}
@endcomponent


