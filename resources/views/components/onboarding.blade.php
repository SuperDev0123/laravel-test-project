<div class="lg:flex h-screen">
    <div class="hidden w-full max-w-md p-12 h-full lg:block bg-blue-600">
        <div class="flex items-center mb-8 space-x-4">
            <a href="#" class="flex items-center text-2xl font-semibold text-white">
                <img src="https://lets.getpress.ai/images/GetPressai_Logo_White.svg" class="mr-3 h-10 sm:h-13" alt="GetPress.ai Logo" />
            </a>
        </div>
        <div class="block p-8 text-white rounded-lg bg-blue-500">
            <h3 class="mb-1 text-2xl font-semibold">Get Ready for Publicity</h3>
            <p class="mb-4 font-light text-blue-100 sm:text-lg">5-day free trial</p>
            <!-- List -->
            <ul role="list" class="space-y-4 text-left">
                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span>Time-saver</span>
                </li>
                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span>AI-generated responsess</span>
                </li>

                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span>Increased coverage</span>
                </li>
                <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span>Personalized matches</span>
                </li>
                                  <li class="flex items-center space-x-3">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-5 h-5 text-green-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span>Real-time notifications</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex items-center mx-auto md:w-[42rem] p-4 md:px-8 xl:px-0 h-screen overflow-y-auto no-scrollbar">
        <div class="w-full h-full px-6">
            <div class="flex items-center justify-center mb-8 space-x-4 lg:hidden">
                <a href="#" class="flex items-center text-2xl font-semibold">
                    <img class="mr-3 mt-5 h-10 sm:h-12" src="https://lets.getpress.ai/images/GetPressai_Logo_Black.svg" />
                </a>
            </div>

            <!-- Onboarding steps -->
            @livewire('onboarding-steps', [
                'currentStep' => $currentStep,
                'steps' => [
                    [
                        "title" => "Personal Bio",
                        "completed" => !Auth::user()->user_bio_completed,
                    ],
                    [
                        "title" => "Company Bio",
                        "completed" => !Auth::user()->current_team->team_description_completed,
                    ],
                ],
            ])


            <!-- Step title and description -->
            @livewire('onboarding-header', [
                'stepTitle' => $stepTitle,
                'stepDescription' => $stepDescription
            ])



            {{ $slot }}
        </div>
    </div>
</div>
