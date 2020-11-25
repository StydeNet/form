@if($hasErrors)
    <div {{ $attributes->merge(['class' => 'invalid-feedback']) }}>{{ $slot }}</div>
@else
    <small {{ $attributes->merge(['class' => 'form-text text-muted']) }}>{{ $slot }}</small>
@endif
