@props(['value'])

<label {{ $attributes->merge(['class' => 'block leading-none font-semibold text-sm text-gray-900 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
