<form method="{{ $httpMethod }}">
    @if ($httpMethod == 'post')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @endif
    @if ($spoofedMethod)
        <input type="hidden" name="_method" value="{{ $method }}">
    @endif
</form>
