<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputForm extends Component
{
    public $key;
    public $label;
    public $data;
    public $action;
    public $value;
    public $type;

    public function __construct(
        $key = '',
        $label = '',
        $data = '',
        $action = 'add',
        $value = '',
        $type = "text"
    )
    {
        $this->$key = $key;
        $this->$label = $label;
        $this->$data = $data;
        $this->$action = $action;
        $this->$value = $value;
        $this->$type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-form');
    }
}
