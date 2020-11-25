<x-form-group :name="$cleanName">
    <label for="{{ $id }}">{{ $label }}</label>

    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        {{ $attributes->merge(['class' => $styles($errors->has($cleanName))]) }}>
</x-form-group>
