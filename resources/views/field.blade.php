<div class="form-group">
    <label for="{{ $name }}">{{ ucfirst($name) }}</label>
    <input name="{{ $name }}" {{ $attributes->merge(['type' => 'text']) }} class="form-control" id="{{ $name }}">
</div>
