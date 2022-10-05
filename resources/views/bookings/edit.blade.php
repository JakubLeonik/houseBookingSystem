@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 d-flex flex-column align-items-center justify-content-center">
            <x-form
                method="POST"
                action="{{ route('houses.update', ['house' => $house]) }}"
                submit-text="Edit house"
                enctype="multipart/form-data"
                :fields="[
                ['type' => 'text', 'name' => 'name', 'value' => old('name', $house->name)],
                ['type' => 'number', 'name' => 'pricePerNight', 'value' => old('pricePerNight', $house->pricePerNight)],
                ['type' => 'number', 'name' => 'numberOfRooms', 'value' => old('numberOfRooms', $house->numberOfRooms)],
                ['type' => 'file', 'name' => 'image'],
            ]"></x-form>
            @can('delete', $house)
                <x-form
                    method="POST"
                    action="{{ route('houses.delete', ['house' => $house->id]) }}"
                    submit-text="Delete house"
                >
                    @method('DELETE')
                </x-form>
            @endcan
            <a class="d-flex justify-content-center text-dark"
               href="{{ route('houses.show', ['house' => $house->id]) }}">
                Go back
            </a>
            <x-validation-errors :errors="$errors" />
        </div>
    </div>
@endsection
