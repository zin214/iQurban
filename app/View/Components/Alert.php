<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;

    public $header;

    public $message;

   public function __construct($type,$header,$message)
   {
       $this->type = $type;
       $this->header = $header;
       $type == 'danger' ? $this->message = $message->all() : $this->message = $message;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
