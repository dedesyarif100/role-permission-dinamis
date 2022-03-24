@aware(['color' => 'green'])
<li {{ $attributes->merge(['class' => 'text-'.$color.'-800']) }}>
    {{ $slot }}
    INI DARI FILE MENU ITEM
</li>
