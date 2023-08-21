<x-app-layout>
    <div id="main-content" class="overflow-y-auto relative h-full bg-gray-50 mx-8 my-16">
        <div class="grid grid-cols-1 gap-4 mt-4 w-full md:grid-cols-1 xl:grid-cols-1">
            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8">                

                @livewire('car-form')

            </div>
        </div>
    </div>
</x-app-layout>
