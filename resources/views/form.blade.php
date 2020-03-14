<form method="{{ $method == 'get' ? 'get' : 'post' }}">
    @if (in_array($method, ['put', 'patch', 'delete']))
        @method($method)
    @endif
</form>
