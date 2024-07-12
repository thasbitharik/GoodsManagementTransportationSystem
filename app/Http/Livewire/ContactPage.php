<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactPage extends Component
{
    public function render()
    {
        return view('livewire.contact-page')->layout('layouts.front_master');
    }
}
