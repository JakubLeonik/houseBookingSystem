@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($bookings as $booking)
                <div class="p-3 m-2 border-bottom border-top col-8 d-flex flex-column justify-content-center align-items-center">
                    House name: {{ $ho }}
                    From:
                </div>
            @endforeach
        </div>
    </div>
@endsection
