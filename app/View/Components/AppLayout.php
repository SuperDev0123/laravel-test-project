<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $fullWidthNoNav;

    public function __construct($fullWidthNoNav = false)
    {
        $this->fullWidthNoNav = $fullWidthNoNav;
    }


    public function render()
    {
        return view('layouts.app');
    }
}
