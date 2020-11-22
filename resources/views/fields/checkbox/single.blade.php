@foreach($options as $option => $display)
    <div id="field-group-{{ $cleanName . ($option ? '-' . $option : '') }}"
        {{ $attributes->merge(['class' => 'custom-control custom-checkbox'])->only('class') }}>

        <input type="checkbox" id="{{ $id }}-{{ $option }}" name="{{ $name }}"
               class="{{ $styles($errors->has($cleanName)) }}"
               value="{{ $option }}" {{ $attributes->except('class') }}{{ $isChecked($option, $errors->any()) }}{{ $required ? ' required' : '' }}>

        <label class="custom-control-label" for="{{ $id }}-{{ $option }}">{{ $display }}{{ $value }}</label>

        @if($errors->has($cleanName))
            <div id="{{ $cleanName }}-feedback" class="invalid-feedback">{{ $errors->first($cleanName) }}</div>
        @elseif($help)
            <small id="{{ $cleanName }}-help" class="form-text text-muted">{{ $help }}</small>
        @endif
    </div>
@endforeach
