<div class="form-group">
    <label for="{{ $name }}"> {{ $label }} </label>
    <textarea {{ $attributes->merge(['class' => 'form-control', 'required' => $required, 'id' => $id])->except('label') }} name="{{ $name }}" rows="{{ $rows }}"></textarea>
    @if($help)
    <small id="{{ $name }}Help" class="form-text text-muted"> {{ $help }} </small>
    @endif
</div>