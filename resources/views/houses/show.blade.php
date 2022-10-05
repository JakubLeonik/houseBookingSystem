@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="p-3 m-2 border-bottom border-top col-8 d-flex flex-column justify-content-center align-items-center">
                <img class="w-25" src="{{ $house->imagePath }}">
                <h2>
                    {{ $house->name }}
                </h2>
                {{ $house->pricePerNight }}$ / {{ $house->numberOfRooms }} rooms
            </div>
            @can('update', $house)
                <a class="d-flex justify-content-center text-dark"
                   href="{{ route('houses.edit', ['house' => $house->id]) }}">
                    Edit
                </a>
            @endcan
            <a class="d-flex justify-content-center text-dark"
               href="{{ route('bookings.create', ['house' => $house->id]) }}">
                Add booking
            </a>
            <a class="d-flex justify-content-center text-dark"
               href="{{ route('index') }}">
                Go back
            </a>
        </div>
    </div>
@endsection
