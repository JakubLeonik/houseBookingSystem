@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($houses as $house)
                <div class="p-3 m-2 border-bottom border-top col-8 d-flex flex-column justify-content-center align-items-center">
                    <h2>
                        <a class="text-dark" href="{{ route('houses.show', ['house' => $house->id]) }}">
                            {{ $house->name }}
                        </a>
                    </h2>
                    {{ $house->pricePerNight }}$ / {{ $house->numberOfRooms }} rooms
                </div>
            @endforeach
        </div>
    </div>
@endsection
