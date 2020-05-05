<div class="form-group{{ $required ? ' required' : ' optional' }}">
    <label for="{{ $name }}">
        {{ ucfirst($name) }}
        @if ($highlightsRequirement())
            <span class="badge badge-danger">required</span>
        @elseif ($highlightsOptional())
            <span class="badge badge-info">optional</span>
        @endif
    </label>
    <input name="{{ $name }}" {{ $attributes->merge(['type' => 'text', 'required' => $required]) }} class="form-control" id="{{ $name }}">
</div>
