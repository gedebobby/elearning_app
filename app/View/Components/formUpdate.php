<?php

namespace App\View\Components;

use Illuminate\View\Component;

class formUpdate extends Component
{
    
    public $method, $route, $guru;
    
    public function __construct($method, $route, $guru)
    {
        $this->method = $method;
        $this->route = $route;
        $this->$guru = $guru;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form-guru');
    }
}
