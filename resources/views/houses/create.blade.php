@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <x-form
                method="POST"
                action="{{ route('houses.store') }}"
                submit-text="Add house"
                :fields="[
                ['type' => 'text', 'name' => 'name'],
                ['type' => 'number', 'name' => 'pricePerNight'],
                ['type' => 'number', 'name' => 'numberOfRooms'],
            ]"></x-form>
            <x-validation-errors :errors="$errors" />
        </div>
    </div>
@endsection
