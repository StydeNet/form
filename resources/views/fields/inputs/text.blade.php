<x-form-group :name="$cleanName">
    <x-label :for="$id" :highlight="$highlight">{{ $label }}</x-label>

    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        {{ $attributes->merge(['class' => $styles($errors->has($cleanName))]) }}>

    @if($errors->has($cleanName))
        <x-feedback>{{ $errors->first($cleanName) }}</x-feedback>
    @elseif($help)
        <x-help>{{ $help }}</x-help>
    @endif
</x-form-group>
