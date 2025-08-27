@extends('layouts.main_layout')

@section('pagetitle', 'Login - Barbearia')

@section('content')
    <div class="flex justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
            <h2 class="text-3xl font-bold text-center mb-6 text-green-600">Login</h2>

            <form method="POST" action="#">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                        required autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Senha</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                    Entrar
                </button>
            </form>

            <p class="mt-4 text-center text-gray-600">
                Não tem uma conta?
                <a href="{{ route('register_view') }}" class="text-green-600 font-semibold hover:underline">Registrar</a>
            </p>
        </div>
    </div>
@endsection
