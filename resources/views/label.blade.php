<label {{ $attributes }}>
    {{ $slot }} @if($highlight) <span class="badge badge-danger">{{ $highlight }}</span> @endif
</label>
