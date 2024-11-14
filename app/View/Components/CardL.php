<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardL extends Component
{
    public $image;
    public $title;
    public $deskripsi;

    public function __construct($image, $title, $deskripsi)
    {
        $this->image = $image;
        $this->title = $title;
        $this->deskripsi = $deskripsi;
    }

    public function render()
    {
        return view('components.card-l');
    }
}
