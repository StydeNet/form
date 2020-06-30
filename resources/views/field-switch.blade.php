<div class="form-group{{ $required ? ' required' : ' optional' }}">
    <label for="{{ $name }}"> {{ $label }} </label>
    @foreach($options as $value => $option)
    <div class="custom-control custom-switch">
        <input type="checkbox" name="{{ $name }}[]" class="custom-control-input" id="switch-{{ $value }}">
        <label class="custom-control-label" for="switch-{{ $value }}">{{ $option }}</label>
    </div>
    @endforeach
    @if($help)
    <small id="help_block_{{ $name }}" class="form-text text-muted">{{ $help }}</small>
    @endif
</div>