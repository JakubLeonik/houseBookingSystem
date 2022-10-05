@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <x-form
                method="POST"
                action="{{ route('houses.update', ['house' => $house]) }}"
                submit-text="Edit house"
                :fields="[
                ['type' => 'text', 'name' => 'name', 'value' => old('name', $house->name)],
                ['type' => 'number', 'name' => 'pricePerNight', 'value' => old('pricePerNight', $house->pricePerNight)],
                ['type' => 'number', 'name' => 'numberOfRooms', 'value' => old('numberOfRooms', $house->numberOfRooms)],
            ]"></x-form>
            <x-validation-errors :errors="$errors" />
        </div>
    </div>
@endsection
