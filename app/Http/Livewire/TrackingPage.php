<?php

namespace App\Http\Livewire;
use DB;
use Carbon;
use Livewire\Component;

class TrackingPage extends Component
{
    public $trackId;

    public $trackview = [];

    public function mount($id)
    {
        $this->trackId = $id;
    }

    public function fetchData()
    {
        $this->trackview = DB::table('goods')
        ->select('goods.*')
        ->where('id', '=', $this->trackId)
        ->get();


    }
    public function render()
    {
        $this->fetchData();
        return view('livewire.tracking-page')->layout('layouts.front_master');
    }
}
