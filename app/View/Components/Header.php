<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $subtitle;
    public $info;
    public $success;
    public $negative;

    public function __construct($title = '', $subtitle = '', $info = null, $success = null, $negative = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->info = $info;
        $this->success = $success;
        $this->negative = $negative;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
