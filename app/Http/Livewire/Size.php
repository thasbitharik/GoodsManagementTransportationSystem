<?php

namespace App\Http\Livewire;
use App\Models\Size as SizeModel;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Route;

class Size extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action=[];

    public $searchKey;
    public $key = 0;
    public $message = "";

    public $size_name = "";
    public $size_amount = "";
    public $dimension = "";

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
             $data = SizeModel::find($this->delete_id);
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
                'size_name' => 'required|max:255',
                'dimension' => 'required|max:255',
                'size_amount' => 'required|max:255'


            ]
        );

        //check id value and execute
        if ($this->key == 0) {
            //here insert data
            $data = new SizeModel();
            $data->size_name = $this->size_name;
            $data->dimension = $this->dimension;
            $data->size_amount = $this->size_amount;
            $data->save();

            //show success message
            session()->flash('message', 'Saved Successfully!');

            //clear data
            $this->clearData();
        } else {
            //here update data
            $data = SizeModel::find($this->key);
            $data->size_name = $this->size_name;
            $data->dimension = $this->dimension;
            $data->size_amount = $this->size_amount;
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
        $data = SizeModel::find($id);
        $this->size_name = $data->size_name;
        $this->dimension = $data->dimension;
        $this->size_amount = $data->size_amount;
        $this->key = $id;
    }

     //clear data
     public function clearData()
     {
         # emty field
         $this->key = 0;
         $this->size_amount = "";
         $this->dimension = "";
         $this->size_name = "";
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
        $this->fetchData();
        $this->pageAction();

        $this->fetchData();
        #if search active
        if (!$this->searchKey) {
           $list_data = DB::table('sizes')
               ->select('sizes.*')
               ->latest()
               ->paginate(10);
       } else {
           $list_data = DB::table('sizes')
               ->select('sizes.*')
               ->where('sizes.size_name', 'LIKE', '%' . $this->searchKey . '%')
               ->latest()
               ->paginate(10);
       }
        return view('livewire.size',['list_data' => $list_data])->layout('layouts.master');
    }
}
