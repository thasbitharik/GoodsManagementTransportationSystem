<?php

namespace App\Http\Livewire;
use App\Models\Good;
use App\Models\Employee;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Route;
use Livewire\WithPagination;


class GoodsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $employee_list = [];

    public $page_action =[];
    public $searchKey;
    public $status;
    public $selected_id;
    public $employeeName= '';
    public $key = 0;

    //open model insert
    public function openModel()
    {
        $this->dispatchBrowserEvent('insert-show-form');
    }

    //close model insert
    public function closeModel()
    {
        $this->dispatchBrowserEvent('insert-hide-form');
    }

    public function openStatusChangeModel()
    {
           $this->dispatchBrowserEvent( 'status-show-form' );
    }

    public function openEmployeeModel()
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
               $data = Good::find( $this->selected_id );
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

       public function saveData()
       {
           $data = Good::find($this->key);
           $data->employee_id = $this->employeeName;
            $data->save();

            session()->flash('message', ' Update Successfuly!');
            $this->clearData();
            $this->closeModel();
       }

        public function clearData()
        {
            $this->key = "";
            $this->employeeName = "";
        }

       public function updateRecord($id)
       {
            $this->openModel();
            $this->key = $id;
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
        $this->employee_list = Employee::Where('status',1)
                                    ->get();
        // dd($this->employee_list);
        $this->pageAction();
        if(!$this->searchKey){
            $list_data= DB :: table('goods')
            ->select('goods.*','categories.category_name','sub_categories.sub_category_name','customers.customer_fname','employees.employee_fname')
            ->leftJoin('categories', 'goods.category_id','categories.id')
            ->leftJoin('sub_categories', 'goods.sub_category_id','sub_categories.id')
            ->leftJoin('customers', 'goods.customer_id','customers.id')
            ->leftJoin('employees', 'goods.employee_id','employees.id')
            ->latest()
            ->paginate(10);

        }
        else{
            $list_data= DB::table('goods')
            ->select('goods.*','categories.category_name','sub_categories.sub_category_name','customers.customer_fname','employees.employee_fname')
            ->leftJoin('categories', 'goods.category_id','categories.id')
            ->leftJoin('sub_categories', 'goods.sub_category_id','sub_categories.id')
            ->leftJoin('customers', 'goods.customer_id','customers.id')
            ->leftJoin('employees', 'goods.employee_id','employees.id')
            ->where('goods.tracking_number','LIKE','%'.$this->searchKey.'%')
            ->orWhere('goods.good_name','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('categories.category_name','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('sub_categories.sub_category_name','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('customers.customer_fname','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('employees.employee_fname','LIKE', '%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);

        }
        return view('livewire.goods-component',['list_data' => $list_data])->layout('layouts.master');
    }
}
