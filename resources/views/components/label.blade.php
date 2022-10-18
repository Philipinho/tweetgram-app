@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium u-text-small text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
