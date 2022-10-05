@props(['errors'])

@if ($errors->any())
    <div class="mt-3 text-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif
