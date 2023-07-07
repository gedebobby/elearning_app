<?php

namespace App\View\Components;

use Illuminate\View\Component;

class formInputGuru extends Component
{
    public $key, $label, $data, $action;
    public function __construct($key, $label, $data, $action)
    {
        $this->key = $key;
        $this->label = $label;
        $this->data = $data;
        $this->action = $action;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-input-guru');
    }
}
