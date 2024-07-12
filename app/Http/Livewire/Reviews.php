<?php

namespace App\Http\Livewire;
use App\Models\ContactReview;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Route;
use Livewire\WithPagination;

class Reviews extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action =[];
    public $searchKey;
    public $status;
    public $selected_id;

    public function openStatusChangeModel()
    {
           $this->dispatchBrowserEvent( 'status-show-form' );
    }


       public function statusChangeModel( $id, $status )
       {
              # code...
              $this->selected_id = $id;
              $this->status = $status;

              //show popup
              $this->openStatusChangeModel();

        }


       // close popup

       public function closeStatusChangeModel()
        {
           $this->dispatchBrowserEvent( 'status-hide-form' );
        }



       public function saveStatusChangeModel()
       {
               $data = ContactReview::find( $this->selected_id );
               $data->status = (int)$this->status;
               $data->save();
           $this->statusClear();
       }

       public function statusClear()
       {
              # code...
              $this->selected_id = null;
              $this->status = null;
              $this->closeStatusChangeModel();
          }

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
            $list_data= DB :: table('contact_reviews')
            ->select('contact_reviews.*','customers.customer_fname')
            ->leftJoin('customers','contact_reviews.customer_id','customers.id')
            ->latest()
            ->paginate(10);
        }
        else{
            $list_data= DB::table('contact_reviews')
            ->select('contact_reviews.*','customers.customer_fname')
            ->leftJoin('customers','contact_reviews.customer_id','customers.id')
            ->where('customers.customer_fname','LIKE','%'.$this->searchKey.'%')
            ->orWhere('contact_reviews.title','LIKE', '%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }

        return view('livewire.reviews',['list_data' => $list_data])->layout('layouts.master');
    }
}
