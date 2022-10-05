@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 d-flex flex-column align-items-center justify-content-center">
            <x-form
                method="POST"
                action="{{ route('bookings.update', ['booking' => $booking]) }}"
                submit-text="Edit booking"
                :fields="[
                ['type' => 'date', 'name' => 'dateFrom', 'value' => old('dateFrom', $booking->dateFrom)],
                ['type' => 'date', 'name' => 'dateFrom', 'value' => old('dateTo', $booking->dateTo)],
                ['type' => 'hidden', 'name' => 'house_id', 'value' => $house->id],
            ]"></x-form>
{{--            @can('delete', $house)--}}
{{--                <x-form--}}
{{--                    method="POST"--}}
{{--                    action="{{ route('houses.delete', ['house' => $house->id]) }}"--}}
{{--                    submit-text="Delete house"--}}
{{--                >--}}
{{--                    @method('DELETE')--}}
{{--                </x-form>--}}
{{--            @endcan--}}
            <a class="d-flex justify-content-center text-dark"
               href="{{ route('bookings.show', ['booking' => $booking->id]) }}">
                Go back
            </a>
            <x-validation-errors :errors="$errors" />
        </div>
    </div>
@endsection
