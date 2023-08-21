<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Onboarding extends Component
{
    public $stepTitle;
    public $stepDescription;
    public $currentStep;

    public function __construct($stepTitle, $stepDescription, $currentStep = 1)
    {
        $this->stepTitle = $stepTitle;
        $this->stepDescription = $stepDescription;
        $this->currentStep = $currentStep;
    }

    public function render()
    {
        return view('components.onboarding');
    }
}
