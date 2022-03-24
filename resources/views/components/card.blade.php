@props(['heading' => null, 'footer' => null])
<span class="alert-title">{{ $heading }}</span><br>
<span class="alert-title">{{ $footer }}</span><br>

<div {{ $attributes->class(['border']) }}>
    <h1 {{ $heading->attributes->class(['text-lg']) }}>
        {{ $heading }}
    </h1>

    {{ $slot }}

    <footer {{ $footer->attributes->class(['text-gray-700']) }}>
        {{ $footer }}
    </footer>
</div>
