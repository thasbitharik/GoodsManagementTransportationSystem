<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.login-page')->layout('layouts.front_master');
    }
}
