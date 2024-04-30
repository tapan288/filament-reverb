<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Sample extends Component
{
    public function render()
    {
        return view('livewire.sample');
    }

    #[On('echo:publicChannel,Test')]
    public function dump()
    {
        dd('dump');
    }
}
