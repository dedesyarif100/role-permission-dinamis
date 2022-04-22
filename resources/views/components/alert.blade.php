<div class="alert alert-{{ $type }}">
    {{ $message }}
    {{-- {{ $alertType }} --}}
</div>
{{-- @dd($slot) --}}
{{-- Default / Merged Attributes --}}
<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }} id="type">
    {{ $message }}
</div>

<div {{ $attributes->class(['p-4', 'bg-red']) }}>
    {{ $message }}
</div>

@php
    // $slot = 'Submit Test';
    // $title = 'INI TITLE';
@endphp

{{-- Conditionally Merge Classes --}}
<button {{ $attributes->class(['p-4'])->merge(['type' => 'button', 'id' => 'button submit', 'value' => 'test']) }}>
    {{ $slot }}
</button>

{{-- Non-Class Attribute Merging --}}
<button {{ $attributes->merge(['type' => 'button']) }}>
    {{ $slot }}
</button>

<div {{ $attributes->merge(['data-controller' => $attributes->prepends('profile-controller')]) }}>
    {{ $slot }}
</div>

{{-- <div {{ $attributes->filter(fn ($value, $key) => $key == 'foo') }}>
    {{ $slot }}
</div> --}}

@props(['judul' => null, 'title' => null, 'component1' => null])
<span class="alert-title">{{ $judul }}</span><br>
<span class="alert-title">{{ $title }}</span><br>
<span class="alert-title">{{ $component1 }}</span>

<div class="alert alert-danger">
    {{ $slot }}
</div>
