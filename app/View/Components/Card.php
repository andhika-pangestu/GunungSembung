<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $image;
    public $title;
    public $location;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $title, $location)
    {
        $this->image = $image;
        $this->title = $title;
        $this->location = $location;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
