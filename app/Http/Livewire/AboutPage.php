<?php

namespace App\Http\Livewire;
use DB;
use Livewire\Component;

class AboutPage extends Component
{
    public $list_data = [];

    public function fetchData()
    {
        $this->list_data = DB::table('contact_reviews')
                            ->select('contact_reviews.*','customers.customer_fname')
                            ->leftJoin('customers','contact_reviews.customer_id','customers.id')
                            ->get();
    }

    public function render()
    {
        $this->fetchData();
        return view('livewire.about-page')->layout('layouts.front_master');
    }
}
