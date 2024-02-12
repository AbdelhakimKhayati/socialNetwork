@props(['type'])
<div>
    <div class="alert alert-{{ $type }}" role="alert">
        {{ $slot }}
    </div>
</div>
