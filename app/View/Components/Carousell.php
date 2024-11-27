<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carousell extends Component
{
    public $slides;

    public function __construct($slides)
    {
        $this->slides = $slides;
    }

    public function render(): View|Closure|string
    {
        return view('components.carousell');
    }
}
