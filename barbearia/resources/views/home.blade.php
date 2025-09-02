@extends('layouts.main_layout')
@section('pageTitle', 'Início')
@section('content')

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 w-full text-center">
            {{ session('success') }}
        </div>
    @endif

    <main class="flex justify-center items-center">

        @foreach ($services as $service)
            <x-service-card :id="$service->id" :name="$service->name" :time="$service->duration" :price="number_format($service->price, 2, ',', '.')" />
        @endforeach

    </main>
@endsection
