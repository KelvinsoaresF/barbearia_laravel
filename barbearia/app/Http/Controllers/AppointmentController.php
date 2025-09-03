<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Availabilities;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function book_service(Request $request)
    {
        $user = Auth::user();

        $validateData = $request->validate(
            [
                'service_id' => 'required|exists:services,id',
                'date' => 'required|date',
                'timeslot' => 'required|string'
            ]
        );

        $service = Service::findOrFail($validateData['service_id']);

        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para agendar um serviço.');
        }

        $availability = Availabilities::where('date', $validateData['date'])
            ->where('timeslot', $validateData['timeslot'])
            ->where('is_booked', false)
            ->first();

        if (!$availability) {
            return back()->withErrors(['timeslot' => 'O horário selecionado não está disponível. Por favor, escolha outro horário.'])->withInput();
        }

        $availability->is_booked = true;
        $availability->save();

        $appointment = Appointment::create([
            'user_id' => $user->id,
            'service_id' => $service->id,
            'availability_id' => $availability->id,
            'status' => 'reservado'
        ]);

        return redirect()->route('home')->with('success', 'Serviço agendado com sucesso!');
    }



    public function my_appointments()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para ver seus agendamentos.');
        }

        $appointments = Appointment::where('user_id', $user->id)
            ->with(['service', 'availability'])
            ->orderBy('created_at', 'desc')
            ->get();

            return view('appointments.my-appointments', compact('appointments'));
    }
}

