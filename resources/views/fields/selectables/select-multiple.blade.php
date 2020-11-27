<x-form-group :name="$cleanName">
    <x-label :for="$id" :highlight="$highlight">{{ $label }}</x-label>

    <select id="{{ $id }}" name="{{ $name }}"
            {{ $attributes->merge(['class' => $errors->has($cleanName) ? 'custom-select is-invalid' : 'custom-select']) }} multiple>

        @isset($empty)
            {{ $empty }}
        @endisset

        @if($options)
            @foreach($options as $key => $option)
                <option value="{{ $key }}"{{ $isSelected($key) }}>{{ $option }}</option>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </select>

    @if($errors->has($cleanName))
        <x-feedback>{{ $errors->first($cleanName) }}</x-feedback>
    @elseif($help)
        <x-help>{{ $help }}</x-help>
    @endif
</x-form-group>
