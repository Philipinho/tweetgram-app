@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'u-text-small u-text-success']) }}>
        {{ $status }}
    </div>
@endif
