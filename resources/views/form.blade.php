<form method="{{ $method == 'put' ? 'post' : $method }}">
    @if ($method == 'post')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @endif
    @if ($method == 'put')
        <input type="hidden" name="_method" value="{{ $method }}">
    @endif
</form>
