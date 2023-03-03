<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputDescription extends Component
{

    public $count = 0;

    public function increment(){
        $this->count++;
    }

    public function decrement(){
        if ($this->count > 0)
            $this->count--;
    }

    public function render()
    {
        return view('livewire.input-description');
    }
}
