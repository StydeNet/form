<div id="field-group-{{ $cleanName }}" class="form-group">
    <label for="{{ $id }}" @error($cleanName) class="text-danger" @enderror>
        {{ $label }}
        @if($highlights())
            <span class="badge badge-{{ $highlights('color-badge') }}">{{ __($highlights('text')) }}</span>
        @endif
    </label>

    <select id="{{ $id }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => $styles($errors->has($cleanName))]) }}{{ $required ? ' required' : '' }}{{ $multiple ? ' multiple' : '' }}>
        @if($empty)
            <option>{{ $empty }}</option>
        @endif

        @if($options)
            @foreach($options as $key => $option)
                <option value="{{ $key }}"{{ $isSelected($key, $errors->any()) }}>{{ $option }}</option>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </select>

    @if($errors->has($cleanName))
        <div id="{{ $cleanName }}-feedback" class="invalid-feedback">{{ $errors->first($cleanName) }}</div>
    @elseif($help)
        <small id="{{ $cleanName }}-help" class="form-text text-muted">{{ $help }}</small>
    @endif
</div>
