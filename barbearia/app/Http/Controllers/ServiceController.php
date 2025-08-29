<?php

namespace App\Http\Controllers;

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
            return ;
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


    }
}
