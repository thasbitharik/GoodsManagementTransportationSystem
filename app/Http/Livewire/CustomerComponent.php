<?php

namespace App\Http\Livewire;
use App\Models\Customer;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Route;
use Livewire\WithPagination;

class CustomerComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action =[];
    public $searchKey;

    public function pageAction()
    {
        # code...
        $x = Route::currentRouteName();
        $data = DB::table('access_points')
        ->select('access_points.access_model_id','access_points.id as access_point','access_points.value', 'access_models.access_model')
        ->join('access_models', 'access_points.access_model_id', '=', 'access_models.id')
        ->where('access_models.access_model', '=',$x)
        ->get();

       $access = session()->get('Access');
       for( $i=0; $i<sizeof($data); $i++ ){
            if(in_array($data[$i]->access_point,$access )){
                array_push($this->page_action,$data[$i]->value);
            }
        }
    }

    public function fetchData()
    {

    }

    public function render()
    {
         $this->fetchData();
        $this->pageAction();
        if(!$this->searchKey){
            $list_data= DB :: table('customers')
            ->select('customers.*')
            ->latest()
            ->paginate(10);
        }
        else{
            $list_data= DB::table('customers')
            ->select('customers.*')
            ->where('customers.customer_fname','LIKE','%'.$this->searchKey.'%')
            ->orWhere('customers.customer_email','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('customers.customer_tp','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('customers.address','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('customers.customer_sname','LIKE', '%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }
        return view('livewire.customer-component',['list_data' => $list_data])->layout('layouts.master');
    }
}
