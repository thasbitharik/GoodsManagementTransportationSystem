<?php

namespace App\Http\Livewire;
use App\Models\DeliveryType as DeliveryTypeModel;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Route;

class DeliveryType extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action=[];

    public $searchKey;
    public $key = 0;
    public $message = "";

    public $delivery_name = "";
    public $delivery_amount = "";

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

     //open model delete
     public $delete_id = 0;
     public function deleteOpenModel($id)
     {
         $this->delete_id = $id;
         $this->dispatchBrowserEvent('delete-show-form');
     }

     #delete Data
     public function deleteRecord()
     {
         # code...
         if ($this->delete_id != 0) {
             $data = DeliveryTypeModel::find($this->delete_id);
             $data->delete();
             $this->deleteCloseModel();
         }
     }

     //close model close
     public function deleteCloseModel()
     {
         $this->dispatchBrowserEvent('delete-hide-form');
     }



    public function fetchData()
    {

    }

    public function saveData()
    {
        //validate data
        $this->validate(
            [
                'delivery_name' => 'required|max:255',
                'delivery_amount' => 'required|max:255'


            ]
        );

        //check id value and execute
        if ($this->key == 0) {
            //here insert data
            $data = new DeliveryTypeModel();
            $data->delivery_name = $this->delivery_name;
            $data->delivery_amount = $this->delivery_amount;
            $data->save();

            //show success message
            session()->flash('message', 'Saved Successfully!');

            //clear data
            $this->clearData();
        } else {
            //here update data
            $data = DeliveryTypeModel::find($this->key);
            $data->delivery_name = $this->delivery_name;
            $data->delivery_amount = $this->delivery_amount;
            $data->save();

            //show success message
            session()->flash('message', ' Update Successfuly!');

            //clear data
            $this->clearData();
        }
    }

    public function updateRecord($id)
    {
        # code...
        $this->openModel();
        $data = DeliveryTypeModel::find($id);
        $this->delivery_name = $data->delivery_name;
        $this->delivery_amount = $data->delivery_amount;
        $this->key = $id;
    }

     //clear data
     public function clearData()
     {
         # emty field
         $this->key = 0;
         $this->delivery_name = "";
         $this->delivery_amount = "";
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

    public function render()
    {
        $this->pageAction();
        $this->fetchData();
        #if search active
        if (!$this->searchKey) {
            $list_data = DB::table('delivery_types')
                ->select('delivery_types.*')
                ->latest()
                ->paginate(10);
        } else {
            $list_data = DB::table('delivery_types')
                ->select('delivery_types.*')
                ->where('delivery_types.delivery_name', 'LIKE', '%' . $this->searchKey . '%')
                ->latest()
                ->paginate(10);
        }
        return view('livewire.delivery-type',['list_data' => $list_data])->layout('layouts.master');
    }
}
