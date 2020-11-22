<div id="field-group-{{ $cleanName }}" class="form-group">
    <label>
        {{ $label }}
        @if($highlights())
            <span class="badge badge-{{ $highlights('color-badge') }}">{{ __($highlights('text')) }}</span>
        @endif
    </label>

    <br>

    @foreach($options as $option => $display)
        <div id="field-group-{{ $cleanName . ($option ? '-' . $option : '') }}"
            {{ $attributes->merge(['class' => 'custom-control custom-checkbox'])->only('class') }}>

            <input type="checkbox" id="{{ $id }}-{{ $option }}" name="{{ $name }}"
                   class="{{ $styles($errors->has($cleanName)) }}"
                   value="{{ $option }}" {{ $attributes->except(['class']) }}{{ $isChecked($option, $errors->any()) }}>

            <label class="custom-control-label" for="{{ $id }}-{{ $option }}">{{ $display }}</label>

            @if($errors->has($cleanName))
                <div id="{{ $cleanName }}-feedback" class="invalid-feedback">{{ $errors->first($cleanName) }}</div>
            @elseif($help)
                <small id="{{ $cleanName }}-help" class="form-text text-muted">{{ $help }}</small>
            @endif
        </div>
    @endforeach
</div>
