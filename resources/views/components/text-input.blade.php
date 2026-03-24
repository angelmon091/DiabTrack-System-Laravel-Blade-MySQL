@props(['disabled' => false, 'icon' => ''])

<div {{ $attributes->merge(['class' => 'input-group']) }}>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '']) !!}>
    @if($icon)
        <i class="{{ $icon }}"></i>
    @endif
</div>
