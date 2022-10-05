@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($bookings as $booking)
                <div class="p-3 m-2 border-bottom border-top col-8 d-flex flex-column text-center">
                    <a href="{{ route('bookings.show', ['booking' => $booking->id]) }}" class="text-dark">
                        Booking number {{ $booking->id }}
                    </a>
                    House name: {{ $booking->house->name }} <br>
                    From: {{ $booking->dateFrom }} to {{ $booking->dateTo }} <br>
                    By {{ $booking->user->name }}
                </div>
            @endforeach
        </div>
    </div>
@endsection
