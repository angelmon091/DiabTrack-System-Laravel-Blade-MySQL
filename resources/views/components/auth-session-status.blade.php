@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'auth-status auth-status--success']) }}>
        {{ $status }}
    </div>
@endif
