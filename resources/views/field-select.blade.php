<div class="form-group">
    <label for="{{ $name }}"> {{ $label }} </label>
    <select
        {{ $attributes->merge(['class' => $classes, 'required' => $required, 'id' => $name, 'multiple' => $multiple]) }} name="{{ $name }}">
        <option>{{ $placeholder }}</option>
        @foreach ($options as $value => $option)
            <option value="{{ $value }}">{{ $option }}</option>
        @endforeach
    </select>
</div>
