<form method="{{ $httpMethod() }}" {{ $attributes }}>
    @if ($httpMethod() == 'post')
        @csrf
    @endif

    @if($spoofedMethod())
        @method($method)
    @endif

    {{ $slot }}
</form>
