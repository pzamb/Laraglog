<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MiniInline extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <h1>Màquina Mini</h1>
            </div>
        blade;
    }
}
