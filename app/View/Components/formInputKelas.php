<?php

namespace App\View\Components;

use Illuminate\View\Component;

class formInputKelas extends Component
{
    public $key, $label, $kelas, $action;
    public function __construct($key, $label, $kelas, $action)
    {
        $this->key = $key;
        $this->label = $label;
        $this->kelas = $kelas;
        $this->action = $action;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-input-kelas');
    }
}
