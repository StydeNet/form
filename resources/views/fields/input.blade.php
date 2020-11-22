<div id="field-group-{{ $cleanName }}" class="form-group">
    <label for="{{ $id }}" @error($cleanName) class="text-danger" @enderror>
        {{ $label }}
        @if($highlights())
            <span class="badge badge-{{ $highlights('color-badge') }}">{{ __($highlights('text')) }}</span>
        @endif
    </label>

    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
           {{ $attributes->merge(['class' => $styles($errors->has($cleanName))]) }}
           value="{{ $value }}"{{ $required ? ' required' : '' }}>

    @if($errors->has($cleanName))
        <div id="{{ $cleanName }}-feedback" class="invalid-feedback">{{ $errors->first($cleanName) }}</div>
    @elseif($help)
        <small id="{{ $cleanName }}-help" class="form-text text-muted">{{ $help }}</small>
    @endif
</div>
