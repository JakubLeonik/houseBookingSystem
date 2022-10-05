@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="p-3 m-2 border-bottom border-top col-8 d-flex flex-column justify-content-center align-items-center">
                House name: {{ $booking->house->name }} <br>
                From: {{ $booking->dateFrom }} to {{ $booking->dateTo }} <br>
                By {{ $booking->user->name }}
            </div>
{{--            @can('update', $house)--}}
{{--                <a class="d-flex justify-content-center text-dark"--}}
{{--                   href="{{ route('houses.edit', ['house' => $house->id]) }}">--}}
{{--                    Edit--}}
{{--                </a>--}}
{{--            @endcan--}}
            <a class="d-flex justify-content-center text-dark"
               href="{{ route('bookings.index') }}">
                Go back
            </a>
        </div>
    </div>
@endsection
