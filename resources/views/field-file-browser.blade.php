<div class="form-group{{ $required ? ' required' : ' optional' }}">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($highlightsRequired())
        <span class="badge badge-danger">{{ __('required') }}</span>
        @elseif ($highlightsOptional())
        <span class="badge badge-info">{{ __('optional') }}</span>
        @endif
    </label>
    <div class="custom-file">
        <input type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'required' => $required, 'id' => $id]) }} name="{{ $name }}">
        <label class="custom-file-label" for="{{ $name }}"> {{ $label }} </label>
    </div>
    @if($help)
    <small id="{{ $name }}Help" class="form-text text-muted">{{ $help }}</small>
    @endif
</div>