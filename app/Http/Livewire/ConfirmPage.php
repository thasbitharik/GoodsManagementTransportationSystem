<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmPage extends Component
{

    public function render()
    {
        $data = session()->get('dispatchDetails');
        return view('livewire.confirm-page',compact('data'))->layout('layouts.front_master');
    }
}
