@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <x-form
                method="POST"
                action="{{ route('houses.store') }}"
                enctype="multipart/form-data"
                submit-text="Add house"
                :fields="[
                ['type' => 'text', 'name' => 'name'],
                ['type' => 'number', 'name' => 'pricePerNight'],
                ['type' => 'number', 'name' => 'numberOfRooms'],
                ['type' => 'file', 'name' => 'image'],
            ]"></x-form>
            <x-validation-errors :errors="$errors" />
        </div>
    </div>
@endsection
