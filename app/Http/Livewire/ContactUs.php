<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Route;
use Livewire\WithPagination;

class ContactUs extends Component
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
            $list_data= DB :: table('contact_us')
            ->select('contact_us.*','customers.customer_fname')
            ->leftJoin('customers','contact_us.customer_id','customers.id')
            ->latest()
            ->paginate(10);
        }
        else{
            $list_data= DB::table('contact_us')
            ->select('contact_us.*','customers.customer_fname')
            ->leftJoin('customers','contact_us.customer_id','customers.id')
            ->where('customers.customer_fname','LIKE','%'.$this->searchKey.'%')
            ->orWhere('contact_us.subject','LIKE', '%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }

        return view('livewire.contact-us',['list_data' => $list_data])->layout('layouts.master');
    }
}
