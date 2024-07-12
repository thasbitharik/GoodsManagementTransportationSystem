<?php

namespace App\Http\Livewire;
use DB;
use Livewire\Component;

class Dashboard extends Component
{

    public $new_name;

    public function oprnModel()
    {
        # code...
        $this->dispatchBrowserEvent('show-form');
    }
    public function render()
    {
        $CustomerCount = DB::table('customers')->count('id');
        $GoodsCount = DB::table('goods')->count('id');
        $Goodsincome = DB::table('goods')->sum('amount');
        return view('livewire.dashboard',compact('CustomerCount','GoodsCount','Goodsincome'))->layout('layouts.master');
    }
}
