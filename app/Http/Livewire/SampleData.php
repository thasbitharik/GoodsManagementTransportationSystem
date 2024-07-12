<?php
namespace App\Http\Livewire;
use App\Models\SampleData as SampleDataModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Route;
class SampleData extends Component
{
    public $page_action=[];
    //public variables basic
    public $list_data = [];

    public $searchKey;
    public $key = 0;
    public $message = "";


    //new variable data management
    public $new_name = "";

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
            $sample_data = SampleDataModel::find($this->delete_id);
            $sample_data->delete();
            $this->deleteCloseModel();
        }
    }

    //close model close
    public function deleteCloseModel()
    {
        $this->dispatchBrowserEvent('delete-hide-form');
    }



    //fetch data from db
    public function fetchData()
    {
        #if search active
        if (!$this->searchKey) {
            $this->list_data = DB::table('sample_data')
                ->select('sample_data.*')
                ->latest()
                ->take(10)
                ->get();
        } else {
            $this->list_data = DB::table('sample_data')
                ->select('sample_data.*')
                ->where('sample_data.name', 'LIKE', '%' . $this->searchKey . '%')
                ->latest()
                ->take(10)
                ->get();
        }
    }

    // insert and update data here
    public function saveData()
    {
        //validate data
        $this->validate(
            [
                'new_name' => 'required|max:30|unique:sample_data,name'


            ]
        );

        //check id value and execute
        if ($this->key == 0) {
            //here insert data
            $data = new SampleDataModel();
            $data->name = $this->new_name;
            $data->save();

            //show success message
            session()->flash('message', 'Saved Successfully!');

            //clear data
            $this->clearData();
        } else {
            //here update data
            $data = SampleDataModel::find($this->key);
            $data->name = $this->new_name;
            $data->save();

            //show success message
            session()->flash('message', ' Update Successfuly!');

            //clear data
            $this->clearData();
        }
    }

    //fill box forupdate
    public function updateRecord($id)
    {
        # code...
        $this->openModel();
        $data = SampleDataModel::find($id);
        $this->new_name = $data->name;
        $this->key = $id;
    }

    //clear data
    public function clearData()
    {
        # emty field
        $this->key = 0;
        $this->new_name = "";
    }


    #comon controls
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
        // return dd($this->list_data);
        //display records
        $this->pageAction();

        return view('livewire.sample-data')->layout('layouts.master');
    }
}

