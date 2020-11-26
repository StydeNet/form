<x-form-group :name="$cleanName">
    <x-label :for="$id" :highlight="$highlight">{{ $label }}</x-label>

    <div class="custom-file">
        <input type="file" id="{{ $id }}" name="{{ $name }}"
            {{ $attributes->merge(['class' => $errors->has($cleanName) ? 'custom-file-input is-invalid' : 'custom-file-input']) }}>
        <label class="custom-file-label" for="{{ $id }}">{{ __('styde-form::field.file') }}</label>

        @if($errors->has($cleanName))
            <x-feedback>{{ $errors->first($cleanName) }}</x-feedback>
        @elseif($help)
            <x-help>{{ $help }}</x-help>
        @endif
    </div>
</x-form-group>
