<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                'name.required' => 'O campo nome é obrigatório.',
                'name.string' => 'O campo nome deve ser uma string.',
                'name.max' => 'O campo nome não pode ter mais de :max caracteres.',

                'email.required' => 'O campo email é obrigatório.',
                'email.string' => 'O campo email deve ser uma string.',
                'email.email' => 'O campo email deve ser um email válido.',
                'email.max' => 'O campo email não pode ter mais de :max caracteres.',
                'email.unique' => 'O email já está em uso.',

                'password.required' => 'O campo senha é obrigatório.',
                'password.string' => 'O campo senha deve ser uma string.',
                'password.min' => 'O campo senha deve ter no mínimo :min caracteres.',
                'password.confirmed' => 'A confirmação da senha não confere.',
            ]
        );

        try {
            $user = User::create([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'password' => Hash::make($validateData['password']),
                'role' => 'user',
            ]);
            Auth::login($user);
            return redirect('home')->with('success', 'Conta criada com sucesso');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao se registrar');
        }
    }

    public function login(Request $request)
    {
        $validateData = $request->validate(
            [
                'email' => 'required|string|email',
                'password' => 'required|string',
            ],
            [
                'email.required' => 'O campo email é obrigatório.',
                'email.string' => 'O campo email deve ser uma string.',
                'email.email' => 'O campo email deve ser um email válido.',

                'password.required' => 'O campo senha é obrigatório.',
                'password.string' => 'O campo senha deve ser uma string.',
            ]
        );

        $user = User::where('email', $validateData['email'])->first();
        $passwordVerify = password_verify($validateData['password'], $user->password);

        if(!$user || !$passwordVerify) {
            return back()->with('error', 'Credenciais inválidas');
        }

        Auth::login($user);
        return redirect('home')->with('success', 'Login realizado com sucesso');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('home')->with('success', 'Logout realizado com sucesso');
    }
}
