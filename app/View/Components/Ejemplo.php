<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Ejemplo extends Component
{
    public $message;

    public function __construct($message)
    {
        $this->message= $message;
    }

    public function my_list($item4){
        return [
            "cuervo 1","cuervo 2", "cuervo 3", $item4
        ];
    }

    public function render()
    {
        return view('components.ejemplo');
    }
}
