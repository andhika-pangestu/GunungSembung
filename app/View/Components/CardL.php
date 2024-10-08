<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardL extends Component
{
    public $image;
    public $title;

    public function __construct($image, $title)
    {
        $this->image = $image;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.card-l');
    }
}
