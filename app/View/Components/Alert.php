<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * The alert type
     *
     * @var string
     */
    public $type;

    /**
     * The alert message
     *
     * @var string
     */
    public $message;

    /**
     * Atribute
     *
     * @var string
     */
    // public $attributes;

    /**
     * The alert alertType
     *
     * @var string
     */
    public $alertType;

    /**
     * The alert except
     *
     * @var array
     */
    // protected $except = ['type'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $message)
    {
        // dd($attributes);
        $this->type = $type;
        $this->message = $message;
        // $this->alertType = $alertType;
        // $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // return <<<'blade'
        //     <div class="alert alert-success">
        //         {{ $slot }}
        //     </div>
        // blade;
        return view('components.alert');
    }

    public function formatAlert()
    {
        return 'FORMAT ALERT FUNCTION';
    }
}
