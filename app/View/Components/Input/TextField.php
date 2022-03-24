<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class TextField extends Component
{
    public $type;
    public $class;
    public $placeholder;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $class, $placeholder, $value)
    {
        $this->type = $type;
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.text-field');
    }
}
