<div id="field-{{ $name }}" class="form-group">
    <label for="{{ $name }}">
        {{ ucfirst($name) }}
        {!! $attributes['required'] ? '<span class="badge badge-info">Required</span>' : ''!!}
    </label>
    @foreach($options as $value => $option)
    <div id="{{ $name }}-{{ $value }}" class="form-check">
        <input type="checkbox" name="{{ $name }}[]" value="{{ $value }}" class="form-check-input"{{ $isChecked($value) }}>
        <label class="form-check-label" for="{{ $value }}">
            {{ucfirst($value)}}
        </label>
    </div>
    @endforeach
    @if($help)
    <small id="help_block_{{ $name }}" class="form-text text-muted">{{ $help }}</small>
    @endif
</div>