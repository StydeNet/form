<div id="field-group-{{ $cleanName }}" class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>

    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        {{ $attributes->merge(['class' => $styles($errors->has($cleanName))]) }}>
</div>
