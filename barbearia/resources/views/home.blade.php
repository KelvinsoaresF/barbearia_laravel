@extends('layouts.main_layout')
@section('pageTitle', 'Início')
@section('content')
    <main class="flex justify-center items-center">

        @foreach ($services as $service)
            <x-service-card
                :name="$service->name"
                :time="$service->duration"
                :price="number_format($service->price, 2, ',', '.')"
            />
        @endforeach

    </main>
@endsection
