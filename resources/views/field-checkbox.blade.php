<div id="field-{{ $name }}" class="form-group{{ $required ? ' required' : ' optional' }}">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($highlightsRequired())
        <span class="badge badge-danger">{{ __('required') }}</span>
        @elseif ($highlightsOptional())
        <span class="badge badge-info">{{ __('optional') }}</span>
        @endif
    </label>
    @foreach($options as $value => $option)
    <div id="{{ $name }}-{{ $value }}" class="form-check">
        <input type="checkbox" name="{{ $name }}[]" value="{{ $value }}" class="form-check-input">
        <label class="form-check-label" for="{{ $value }}">
            {{ucfirst($value)}}
        </label>
    </div>
    @endforeach
    @if($help)
    <small id="help_block_{{ $name }}" class="form-text text-muted">{{ $help }}</small>
    @endif
</div>