<div id="field-group-{{ $cleanName }}"
    {{ $attributes->merge(['class' => 'custom-control custom-checkbox'])->only('class') }}>

    <input type="checkbox" id="{{ $id }}" name="{{ $name }}" value="{{ $option }}"
           class="{{ $errors->has($cleanName) ? 'custom-control-input is-invalid' : 'custom-control-input' }}"
        {{ $isChecked($option, $errors->any()) }} {{ $attributes->except('class') }}>

    <label class="custom-control-label" for="{{ $id }}">{{ $label }}</label>

    @if($errors->has($cleanName))
        <x-feedback>{{ $errors->first($cleanName) }}</x-feedback>
    @elseif($help)
        <x-help>{{ $help }}</x-help>
    @endif
</div>
