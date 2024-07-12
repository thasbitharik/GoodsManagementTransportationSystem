<?php

namespace App\Http\Livewire;
use App\Models\Good;
use Livewire\Component;
use DB;
use Auth;

class DispatchHistory extends Component
{
    public $goods;
    public function fetchtDetails()
    {
        $customer = Auth::guard('customer')->user();
        $customer_id = $customer->id;

         $this->goods = Good::Where('customer_id',$customer_id)
                            ->select('goods.*','customers.customer_fname')
                            ->leftJoin('customers','goods.customer_id', 'customers.id')
                            ->get();
        // dd($this->goods);
    }

    public function render()
    {
        $this->fetchtDetails();
        return view('livewire.dispatch-history')->layout('layouts.front_master');
    }
}
