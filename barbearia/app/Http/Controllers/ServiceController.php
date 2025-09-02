<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Availabilities;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redis;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('home', compact('services'));
    }

    public function create_service(Request $request)
    {
        if (Gate::denies('create-service')) {
            return;
        }

        $user = Auth::user();


        $validateData = $request->validate(
            [
                'name' => 'required|string|max:55',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'duration' => 'required|integer|min:5'
            ],
            [
                'name.required' => 'O nome do serviço é obrigatório.',
                'name.string' => 'O nome do serviço deve ser uma string.',
                'name.max' => 'O nome do serviço não pode exceder :55 caracteres.',
                'description.string' => 'A descrição do serviço deve ser uma string.',
                'price.required' => 'O preço do serviço é obrigatório.',
                'price.numeric' => 'O preço do serviço deve ser um número.',
                'price.min' => 'O preço do serviço deve ser no mínimo :min.',
                'duration.required' => 'A duração do serviço é obrigatória.',
                'duration.integer' => 'A duração do serviço deve ser um número inteiro.',
                'duration.min' => 'A duração do serviço deve ser no mínimo :5 minuto.'
            ]
        );

        $service = new Service();
        $service->name = $validateData['name'];
        $service->description = $validateData['description'];
        $service->price = $validateData['price'];
        $service->duration = $validateData['duration'];
        $service->save();
    }

    public function show_service($id)
    {
        $service = Service::findOrFail($id);

        $availabilities = Availabilities::where('is_booked', false)
            ->orderBy('date')
            ->orderBy('timeslot')
            ->get()
            ->groupBy('date'); // Agrupa por dia


        return view('service.show-service', compact('service', 'availabilities'));
    }

    // public function book_service(Request $request, $id)
    // {
    //     $user = Auth::user();

    //     $service = Service::findOrFail($id);

    //     $validateData = $request->validate(
    //         [
    //             'date' => 'required|date',
    //             'timeslot' => 'required|string'
    //         ]
    //     );

    //     if (!$user) {
    //         return redirect()->route('login')->with('error', 'Você precisa estar logado para agendar um serviço.');
    //     }

    //     $availability = Availabilities::where('date', $validateData['date'])
    //         ->where('timeslot', $validateData['timeslot'])
    //         ->where('is_booked', false)
    //         ->first();

    //     if (!$availability) {
    //         return back()->withErrors(['timeslot' => 'O horário selecionado não está disponível. Por favor, escolha outro horário.'])->withInput();
    //     }

    //     $availability->is_booked = true;
    //     $availability->save();

    //     $appointment = Appointment::create([
    //         'user_id' => $user->id,
    //         'service_id' => $service->id,
    //         'availability_id' => $availability->id,
    //         'status' => 'reservado'
    //     ]);

    //     return redirect()->route('home')->with('success', 'Serviço agendado com sucesso!');
    // }


}
