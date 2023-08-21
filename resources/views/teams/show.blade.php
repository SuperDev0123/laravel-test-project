<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brand Settings') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('teams.update-team-name-form', ['team' => $team])

            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('team-profile-fields', ['team' => $team])
            </div>

            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('update-team-keywords', ['team' => $team])
            </div>

            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('update-team-threshold', ['team' => $team])
            </div>

            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('select-source-list')
            </div>

            <x-section-border />

            @livewire('teams.team-member-manager', ['team' => $team])

            <x-section-border />
            <div class="mt-10 sm:mt-0">
                <x-form-section submit="">
                    <x-slot name="title">
                        {{ __('Billing Status') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Choose your plan.') }}
                    </x-slot>

                    <x-slot name="form">
                        <div class="col-span-6 sm:col-span-4">
                            <div class="max-w-xl text-sm text-gray-600">
                                @if (!$team->subscribed('default'))
                                    Subscribe to a paid plan to boost your earned media.
                                @endif
                                @if ($team->subscribed('default'))
                                    Switch your subscription to a different type, such as a monthly plan, annual plan.
                                    And see a list of subscription plans that {{ config('app.name') }} offers.
                                @endif
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="actions">
                        @if (!$team->subscribed('default'))
                            <a class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800transition ease-in-out duration-150"
                                href="/billing">Subscribe Plan</a>
                        @endif
                        @if ($team->subscribed('default'))
                            <a class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 transition ease-in-out duration-150"
                                href="/billing">Change Plan</a>
                        @endif
                    </x-slot>
                </x-form-section>
            </div>

            {{-- @if (Gate::check('delete', $team) && !$team->personal_team)
                <x-section-border />
                <div class="mt-10 sm:mt-0">
                    @livewire('teams.delete-team-form', ['team' => $team])
                </div>
            @endif --}}

            <x-section-border />

            <div class="mt-10 sm:mt-0 mb-10">
                <x-form-section submit="">
                    <x-slot name="title">
                        {{ __('Email Account') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Update your email account.') }}
                    </x-slot>

                    <x-slot name="form">
                        <div class="col-span-6 sm:col-span-4" id="smtp">
                            @if ($team->smtpSetting != null)
                                <div class="flex gap-5 items-center">
                                    @if ($team->smtpSetting['smtp_host'] == 'smtp.gmail.com')
                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 326667 333333" shape-rendering="geometricPrecision"
                                            text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                            fill-rule="evenodd" clip-rule="evenodd">
                                            <path
                                                d="M326667 170370c0-13704-1112-23704-3518-34074H166667v61851h91851c-1851 15371-11851 38519-34074 54074l-311 2071 49476 38329 3428 342c31481-29074 49630-71852 49630-122593m0 0z"
                                                fill="#4285f4" />
                                            <path
                                                d="M166667 333333c44999 0 82776-14815 110370-40370l-52593-40742c-14074 9815-32963 16667-57777 16667-44074 0-81481-29073-94816-69258l-1954 166-51447 39815-673 1870c27407 54444 83704 91852 148890 91852z"
                                                fill="#34a853" />
                                            <path
                                                d="M71851 199630c-3518-10370-5555-21482-5555-32963 0-11482 2036-22593 5370-32963l-93-2209-52091-40455-1704 811C6482 114444 1 139814 1 166666s6482 52221 17777 74814l54074-41851m0 0z"
                                                fill="#fbbc04" />
                                            <path
                                                d="M166667 64444c31296 0 52406 13519 64444 24816l47037-45926C249260 16482 211666 1 166667 1 101481 1 45185 37408 17777 91852l53889 41853c13520-40185 50927-69260 95001-69260m0 0z"
                                                fill="#ea4335" />
                                        </svg>
                                        <div>
                                            <p class="font-bold">
                                                Gmail / G-Suite
                                            </p>
                                        </div>
                                    @elseif ($team->smtpSetting['smtp_host'] == 'smtp.office365.com')
                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 278050 333334" shape-rendering="geometricPrecision"
                                            text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                            fill-rule="evenodd" clip-rule="evenodd">
                                            <path fill="#ea3e23"
                                                d="M278050 305556l-29-16V28627L178807 0 448 66971l-448 87 22 200227 60865-23821V80555l117920-28193-17 239519L122 267285l178668 65976v73l99231-27462v-316z" />
                                        </svg>
                                        <div>
                                            <p class="font-bold">
                                                Office 365 / Outlook
                                            </p>
                                        </div>
                                    @else
                                        <svg class="w-8 h-8" id="Layer_1" data-name="Layer 1"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 117.88 122.88">
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: #4d8bba;
                                                    }

                                                    .cls-2 {
                                                        fill: #9fd9f1;
                                                    }

                                                    .cls-3,
                                                    .cls-5 {
                                                        fill: #fff;
                                                    }

                                                    .cls-4 {
                                                        fill: #00a912;
                                                    }

                                                    .cls-4,
                                                    .cls-5 {
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <title>email-verification</title>
                                            <path class="cls-1"
                                                d="M110.44,41.57a3.59,3.59,0,0,1,2.43-.93,4,4,0,0,1,2.06.6,5.09,5.09,0,0,1,1.26,1.07,7.06,7.06,0,0,1,1.69,4.26v70.64a5.71,5.71,0,0,1-1.66,4h0a5.67,5.67,0,0,1-4,1.66H5.67a5.71,5.71,0,0,1-4-1.66h0a5.62,5.62,0,0,1-1.66-4V46.57a7.1,7.1,0,0,1,1.73-4.32,5.5,5.5,0,0,1,1.26-1,4,4,0,0,1,2-.58,3.59,3.59,0,0,1,2,.57V2.74A2.74,2.74,0,0,1,9.7,0H78.9A2.71,2.71,0,0,1,81,1l28.65,29.59a2.71,2.71,0,0,1,.78,1.9h0v.79c0,.11,0,.22,0,.34s0,.22,0,.33v7.63Z" />
                                            <polygon class="cls-2"
                                                points="112.39 109.75 112.39 47.12 76.6 78.39 112.39 109.75 112.39 109.75 112.39 109.75" />
                                            <polygon class="cls-2"
                                                points="40.79 78.69 5.49 47.15 5.49 109.63 40.79 78.69 40.79 78.69 40.79 78.69" />
                                            <path class="cls-2"
                                                d="M56.52,92.74,44.9,82.36,5.49,116.9v.31a.17.17,0,0,0,0,.13h0a.22.22,0,0,0,.13,0H112.21a.22.22,0,0,0,.13,0h0a.17.17,0,0,0,0-.13V117L72.45,82,60.15,92.76h0a2.73,2.73,0,0,1-3.62,0Z" />
                                            <path class="cls-3"
                                                d="M102.31,30.86,78,5.74V5.49H12.44V46h0L46.66,76.6l.15.14L58.36,87.06,105,46.36v-10l-2.64-5.49Z" />
                                            <path class="cls-4"
                                                d="M58.7,13.35A25.26,25.26,0,1,1,33.44,38.61,25.26,25.26,0,0,1,58.7,13.35Z" />
                                            <path class="cls-5"
                                                d="M50.86,34.6l4.47,4.22L65.91,28.1c.88-.89,1.43-1.6,2.51-.49l3.51,3.59c1.15,1.14,1.09,1.81,0,2.87L57.34,48.43c-2.29,2.25-1.89,2.39-4.22.08L45,40.39a1,1,0,0,1,.1-1.58l4.07-4.22c.62-.65,1.11-.59,1.74,0Z" />
                                        </svg>
                                        <div>
                                            <p class="font-bold">
                                                IMAP / SMTP
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                @if ($team->smtpSetting->status == 'active')
                                    <div class="py-4 flex gap-2 mb-2 flex-wrap">
                                        <div class="w-40 text-sm">
                                            <p class="font-bold text-gray-500">SMTP Host</p>
                                            <p class="text-gray-500">{{ $team->smtpSetting['smtp_host'] }}</p>
                                        </div>
                                        <div class="w-40 text-sm">
                                            <p class="font-bold text-gray-500">SMTP Port</p>
                                            <p class="text-gray-500">{{ $team->smtpSetting['smtp_port'] }}</p>
                                        </div>
                                        <div class="w-40 text-sm">
                                            <p class="font-bold text-gray-500">SMTP Email</p>
                                            <p class="text-gray-500">{{ $team->smtpSetting['smtp_username'] }}</p>
                                        </div>
                                        <div class="w-40 text-sm">
                                            <p class="font-bold text-gray-500">SMTP From Name</p>
                                            <p class="text-gray-500">{{ $team->smtpSetting['smtp_from_name'] }}</p>
                                        </div>
                                    </div>
                                @elseif ($team->smtpSetting->status == 'inactive')
                                    <div class="p-12 text-red-500">
                                        There is an error with your SMTP account
                                    </div>
                                @else
                                    <div class="p-12 text-blue-500">
                                        Checking to see if this account works...
                                    </div>
                                @endif
                            @endif
                            <x-button type="button"
                                class="btn btn-primary {{ !$team->smtpSetting || $team->smtpSetting->status == 'active' ? '' : 'bg-red-500 hover:bg-red-600' }}"
                                data-modal-target="{{ $team->smtpSetting ? 'removeAccountModal' : 'emailAccountModal' }}"
                                data-modal-toggle="{{ $team->smtpSetting ? 'removeAccountModal' : 'emailAccountModal' }}">
                                {{ $team->smtpSetting ? 'Remove' : 'Add' }} Email Account
                            </x-button>
                            <div id="emailAccountModal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                                    @livewire('email-provider-component', ['team' => $team])
                                </div>
                            </div>
                            @if ($team->smtpSetting)
                                <div id="removeAccountModal" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="removeAccountModal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>

                                            <div class="p-6 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Are you sure you want to remove this provider?</h3>
                                                <a href="/smtp/remove/{{ $team->smtpSetting->id }}"
                                                    class="cursor-pointer text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Yes, I'm sure
                                                </a>
                                                <button data-modal-hide="removeAccountModal" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-slot>
                </x-form-section>
            </div>
</x-app-layout>
