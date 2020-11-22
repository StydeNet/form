@foreach($options as $option => $display)
    <div id="field-group-{{ $cleanName . ($option ? '-' . $option : '') }}"
        {{ $attributes->merge(['class' => 'custom-control custom-radio'])->only('class') }}>

        <input type="radio" id="{{ $id }}-{{ $option }}" name="{{ $name }}"
               class="{{ $styles($errors->has($name)) }}"
               value="{{ $option }}" {{ $attributes->except('class') }}{{ $isChecked($option) }}{{ $required ? ' required' : '' }}>

        <label class="custom-control-label" for="{{ $id }}-{{ $option }}">{{ $display }}</label>

        @if($errors->has($name))
            <div id="{{ $name }}-feedback" class="invalid-feedback">{{ $errors->first($name) }}</div>
        @elseif($help)
            <small id="{{ $name }}-help" class="form-text text-muted">{{ $help }}</small>
        @endif
    </div>
@endforeach
