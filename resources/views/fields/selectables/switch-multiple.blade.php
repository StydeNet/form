<x-form-group :name="$cleanName">
    <x-label :highlight="$highlight">{{ $label }}</x-label>

    <br>

    @foreach($options as $option => $display)
        <div {{ $attributes->merge(['class' => 'custom-control custom-switch'])->only('class') }}>
            <input type="checkbox" id="{{ $id }}-{{ $option }}" name="{{ $name }}" value="{{ $option }}"
                   class="{{ $errors->has($cleanName) ? 'custom-control-input is-invalid' : 'custom-control-input' }}"
                {{ $isChecked($option) }} {{ $attributes->except(['class']) }}>

            <label class="custom-control-label" for="{{ $id }}-{{ $option }}">{{ $display }}</label>

            @if($errors->has($cleanName))
                <x-feedback>{{ $errors->first($cleanName) }}</x-feedback>
            @elseif($help)
                <x-help>{{ $help }}</x-help>
            @endif
        </div>
    @endforeach
</x-form-group>
