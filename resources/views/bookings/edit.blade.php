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
                ['type' => 'date', 'name' => 'dateTo', 'value' => old('dateTo', $booking->dateTo)],
                ['type' => 'hidden', 'name' => 'house_id', 'value' => $house->id],
            ]"></x-form>
            @can('delete', $booking)
                <x-form
                    method="POST"
                    action="{{ route('bookings.delete', ['booking' => $booking->id]) }}"
                    submit-text="Delete booking"
                >
                    @method('DELETE')
                </x-form>
            @endcan
            <a class="d-flex justify-content-center text-dark"
               href="{{ route('bookings.show', ['booking' => $booking->id]) }}">
                Go back
            </a>
            <x-validation-errors :errors="$errors" />
        </div>
    </div>
@endsection
