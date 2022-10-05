@props(['fields' => []])

<form {{ $attributes->except(['submit-text']) }} class="w-50 gap-3 p-4 d-flex flex-column justify-content-center align-items-center">
    @csrf
    @foreach($fields as $field)
        <input
            class="form-control w-50 rounded-pill"
            type="{{ $field['type'] }}"
            name="{{ $field['name'] }}"
            id="{{ $field['name'] }}"
            placeholder="{{ ucfirst($field['name']) }}"
            value="{{ isset($field['value']) ? $field['value'] : old($field['name']) }}"
            required/>
    @endforeach

    {{ $slot }}

    <input
        class="form-control w-25 rounded-pill"
        type="submit"
        value="{{ $attributes['submit-text'] }}"/>
</form>
