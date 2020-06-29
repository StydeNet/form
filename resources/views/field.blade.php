<div class="form-group{{ $required ? ' required' : ' optional' }}">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($highlightsRequired())
        <span class="badge badge-danger">{{ __('required') }}</span>
        @elseif ($highlightsOptional())
        <span class="badge badge-info">{{ __('optional') }}</span>
        @endif
    </label>
    <input name="{{ $name }}" {{ $attributes->merge(['type' => $type, 'class' => $classes,'required' => $required])->except('help') }} id="{{ $name }}">
    @if($help)
    <small id="{{ $name }}Help" class="form-text text-muted">{{ $help }}</small>
    @endif
</div>