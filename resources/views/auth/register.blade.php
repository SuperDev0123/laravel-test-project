<x-guest-layout>
    <x-authentication-card>
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class=" px-4 py-8 mx-auto lg:grid lg:gap-20 lg:py-16 lg:grid-cols-12">
                <div class="flex-col justify-between hidden mr-auto lg:flex lg:col-span-5 xl:col-span-6 xl:mb-0">
                <div>
                    <a href="#" class="inline-flex items-center mb-6 text-2xl font-semibold text-gray-900 lg:mb-10 dark:text-white">
                        <img class="h-12 mr-2" src="../images/GetPressai_Logo_Black.svg" alt="GetPress.ai Logo">
                    </a>

                        <div class="lg:mb-12">
                            <h2 class="mb-2 text-5xl font-bold text-gray-900 dark:text-white mb-3">Never Miss</h2>
                            <h2 class="mb-2 text-5xl font-bold text-gray-900 dark:text-white mb-3">an Earned Media</h2>
                            <h2 class="mb-2 text-5xl font-bold text-gray-900 dark:text-white mb-3">Opportunity Again</h2>
                        </div>

                        <div class="flex mt-6">
                            <svg class="w-5 h-5 mr-2 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <div>
                                <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Auto-Detection</h3>
                                <p class="mb-2 font-light text-gray-500 dark:text-gray-400">Our advanced AI quickly finds relevant queries, saving you time and effort.</p>
                            </div>
                            </div>
                            <div class="flex pt-8">
                            <svg class="w-5 h-5 mr-2 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <div>
                                <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Domain Authority</h3>
                                <p class="mb-2 font-light text-gray-500 dark:text-gray-400">Prioritize your outreach on high DA publications.</p>
                            </div>
                            </div>
                            <div class="flex pt-8">
                            <svg class="w-5 h-5 mr-2 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <div>
                                <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Tailored Pitches</h3>
                                <p class="mb-2 font-light text-gray-500 dark:text-gray-400">Craft professional and engaging pitches with your saved drafts.</p>
                            </div>
                        </div>

                </div>
            </div>

            <div class="mb-6 text-center lg:hidden">
                <a href="#" class="inline-flex items-center text-2xl font-semibold text-gray-900 lg:hidden dark:text-white">
                    <img class="h-12 mr-2" src="../images/GetPressai_Logo_Black.svg" alt="GetPress.ai Logo">
                </a>
            </div>
            <div class="w-full mx-auto bg-white rounded-lg shadow dark:bg-gray-800 md:mt-0 sm:max-w-lg xl:p-0 lg:col-span-7 xl:col-span-6">
                <div class="p-6 space-y-4 lg:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 sm:text-2xl dark:text-white">
                        Create your Account
                    </h1>

                    <x-validation-errors class="mb-4" />
                    <form class="space-y-4 lg:space-y-6" method="POST" action="{{ route('register.custom') }}">
                        @csrf
                        <div>
                                <x-label for="name" value="{{ __('Name') }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"/>
                                <x-input id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div>
                                <x-label for="email" value="{{ __('Email') }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                                <x-input id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>


                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"/>
                            <x-input id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="password" name="password" required autocomplete="password" />
                        </div>

                        <div>
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"/>
                            <x-input id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div>
                            <label for="how_did_you_find_out_about_us" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How did you find out about us?</label>
                            <select name="heard_about_us" id="how_did_you_find_out_about_us" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected="">Choose a option</option>
                                <option value="Friend">Friend</option>
                                <option value="Google Search">Google Search</option>
                                <option value="LinkedIn">LinkedIn</option>
                                <option value="Email">Email</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <x-label for="flex items-start">
                                <div class="flex items-start">
                                <label for="terms" class="flex items-center">
                                    <div class="flex items-center h-5">
                                        <x-checkbox name="terms" id="terms" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="https://www.getpress.ai/privacy-policy" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="https://www.getpress.ai/terms-of-service" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </label>
                                </div>
                            </x-label>
                    @endif


                        {{-- We use the id create-account-submit-button in google tag manager to register the conversion --}}
                        <button type="submit" id="create-account-submit-button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create an account</button>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            {{ __('Already have an account?') }} <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign in here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        </section>
    </x-authentication-card>
</x-guest-layout>
