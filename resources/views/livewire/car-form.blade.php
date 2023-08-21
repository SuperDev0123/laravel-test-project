<div>
    <ol class="flex items-center text-sm font-medium text-center text-gray-500 sm:text-base mx-60">
        <li
            class="flex md:w-full items-center text-blue-600 sm:after:content-[''] after:w-full after:h-1 after:border-b {{ $page == 2 ? 'after:border-blue-200' : 'after:border-gray-200' }} after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                @if ($page == 2)
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                @endif
                <span class="flex w-12 cursor-pointer" wire:click="updatePage(1)">Step 1</span>
            </span>
        </li>
        <li class="flex items-center {{ $page == 2 ? 'text-blue-600' : 'text-gray-600' }}">
            <span class="flex w-16 cursor-pointer" wire:click="updatePage(2)">Step 2</span>
        </li>
    </ol>
    <div class="my-16 mx-12">
        <div class="h-[500px] relative overflow-x-hidden">
            <form wire:submit.prevent="submitNext"
                class="absolute {{ $page == 1 ? 'left-0' : '-left-full' }} top-0 w-full transition-all">
                <fieldset {{ $deactive ? 'disabled' : '' }}>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Case</label>
                        <input wire:model.debounce.500ms="case" id="case" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder=" " />
                        @error('case')
                            <span class="text-red-500 text-sm">* {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Make</label>
                            <select wire:model.debounce.500ms="make" id="make"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select Make</option>
                                <option value="BMW">BMW</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="Jeep">Jeep</option>
                            </select>
                            @error('make')
                                <span class="text-red-500 text-sm">* {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                            <select wire:model.debounce.500ms="model" id="model"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select Model</option>
                                @foreach ($models as $modelOption)
                                    <option value="{{ $modelOption }}">{{ $modelOption }}</option>
                                @endforeach
                            </select>
                            @error('model')
                                <span class="text-red-500 text-sm">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Mileage</label>
                            <input wire:model.debounce.500ms="mileage" id="mileage" type="number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('mileage')
                                <span class="text-red-500 text-sm">* {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Buying
                                Date</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide type="text" id="buying_date" wire:ignore value="{{ $buyingDate }}"
                                    autocomplete="off"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                            @error('buyingDate')
                                <span class="text-red-500 text-sm">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Get Quote</button>
                    </div>
                </fieldset>
                <script>
                    const datepickerEl = document.getElementById('buying_date');

                    datepickerEl.addEventListener('changeDate', (event) => {
                        window.livewire.emit('updateDate', event.detail.date);
                    });
                </script>
            </form>

            <form wire:submit.prevent="submitComplete"
                class="absolute {{ $page == 2 ? 'left-0' : 'left-full' }} top-0 w-full transition-all">
                <fieldset {{ $deactive ? 'disabled' : '' }}>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Color</label>
                            <select wire:model.debounce.500ms="color" id="color"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select Color</option>
                                <option value="white">White</option>
                                <option value="silver">Silver</option>
                                <option value="black">Black</option>
                                <option value="other">Other</option>
                            </select>
                            @error('color')
                                <span class="text-red-500 text-sm">* {{ $message }}</span>
                            @enderror
                        </div>
                        @if ($model == 'Grand Cherokee')
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900">Drivetrain</label>
                                <select wire:model.debounce.500ms="drivetrain" id="drivetrain"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Select Drivetrain</option>
                                    <option value="2x4">2x4</option>
                                    <option value="4x4">4x4</option>
                                </select>
                                @error('drivetrain')
                                    <span class="text-red-500 text-sm">* {{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="relative z-0 w-full group">
                            <label for="picture">Picture</label>
                            {{-- <input wire:model="picture" accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file"> --}}

                            <div class="flex items-center justify-center w-full mb-1">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 relative">
                                    @if ($picture_url)
                                        <button type="button" wire:click="removePicture"
                                            class="absolute right-4 top-4 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    @endif
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        @if ($picture_url)
                                            <img src="{{ $picture_url }}" class="!h-[100px] w-auto my-4"
                                                alt="preview">
                                        @else
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                        @endif
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Image Type (MAX.
                                            2MB)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" wire:model="picture"
                                        accept="image/*" />
                                </label>
                            </div>

                            @error('picture_url')
                                <span class="text-red-500 text-sm">* {{ $message }}</span>
                            @enderror
                            @error('picture')
                                <span class="text-red-500 text-sm">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Get Quote</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
