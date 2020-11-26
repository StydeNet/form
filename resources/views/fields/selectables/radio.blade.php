<div id="{{ sprintf('field-group-%s-%s', $cleanName, $option) }}"
    {{ $attributes->merge(['class' => 'custom-control custom-radio'])->only('class') }}>

    <input type="radio" id="{{ sprintf('%s-%s', $id, $option) }}" name="{{ $name }}" value="{{ $option }}"
           class="{{ $errors->has($cleanName) ? 'custom-control-input is-invalid' : 'custom-control-input' }}"
        {{ $isChecked($option) }} {{ $attributes->except('class') }}>

    <label class="custom-control-label" for="{{ sprintf('%s-%s', $id, $option) }}">{{ $label }}</label>

    @if($errors->has($cleanName))
        <x-feedback>{{ $errors->first($cleanName) }}</x-feedback>
    @elseif($help)
        <x-help>{{ $help }}</x-help>
    @endif
</div>
