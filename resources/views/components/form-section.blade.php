@props(['submit', 'formStyle' => '', 'theme' => ''])

<div {{ $attributes->merge(['class' => ($formStyle == 'vertical') ? 'md:grid' : 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="{{ ($formStyle == 'vertical') ? 'md:grid' : 'mt-5 md:mt-0 md:col-span-2' }}">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="{{ ($formStyle == 'vertical') ? '' : 'px-4 py-5 bg-white sm:p-6' }}  {{$theme != 'white' ? 'shadow' : ''}} {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
            <div class="{{ ($formStyle == 'vertical') ? 'grid' : 'grid grid-cols-6 gap-6' }}">
                {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 {{$theme != 'white' ? 'bg-gray-50 shadow' : ''}} text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
