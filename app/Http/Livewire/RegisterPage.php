<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterPage extends Component
{
    public function render()
    {
        return view('livewire.register-page')->layout('layouts.front_master');
    }
}
