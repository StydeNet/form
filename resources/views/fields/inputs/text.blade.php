<x-form-group :name="$cleanName">
    <x-label :for="$id">{{ $label }}</x-label>

    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        {{ $attributes->merge(['class' => $styles($errors->has($cleanName))]) }}>
</x-form-group>
