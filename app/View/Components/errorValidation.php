<?php

namespace App\View\Components;

use Illuminate\View\Component;

class errorValidation extends Component
{
    public $input;
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.error-validation');
    }
}
