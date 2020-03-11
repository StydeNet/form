<form method="{{ $method == 'get' ? 'get' : 'post' }}"{{ $attributes }}>
@if ($method == 'put')
    @method($method)
@endif
</form>
