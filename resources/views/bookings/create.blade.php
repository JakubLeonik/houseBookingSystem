@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <x-form
                method="POST"
                action="{{ route('bookings.store') }}"
                enctype="multipart/form-data"
                submit-text="Add booking"
                :fields="[
                ['type' => 'date', 'name' => 'dateFrom'],
                ['type' => 'date', 'name' => 'dateTo'],
                ['type' => 'hidden', 'name' => 'house_id', 'value' => $house->id],
            ]"></x-form>
            <x-validation-errors :errors="$errors" />
        </div>
    </div>
@endsection
