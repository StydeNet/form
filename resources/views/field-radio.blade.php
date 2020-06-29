@foreach($options as $value => $option)
    <div class="custom-control custom-radio">
        <input type="radio" name="{{ $name }}" class="custom-control-input">
        <label class="custom-control-label" for="{{ $value }}">{{ucfirst($value)}}</label>
    </div>
@endforeach
@if($help)
    <small id="help_block_{{ $name }}" class="form-text text-muted">{{ $help }}</small>
@endif
