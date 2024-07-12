<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Route;

class SubCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action=[];

    public $searchKey;
    public $key = 0;
    public $message = "";


    //new variable data management
    public $new_sub_category_name = "";
    public $new_category_name = "";
    public $category_list = [];


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
            $data = SubCategory::find($this->delete_id);
            $data->delete();
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
        $this->category_list = Category::get();
    }

    // insert and update data here
    public function saveData()
    {
        //validate data
        $this->validate(
            [
                'new_sub_category_name' => 'required|max:255',
                'new_category_name' => 'required|max:255'


            ]
        );

        //check id value and execute
        if ($this->key == 0) {
            //here insert data
            $data = new SubCategory();
            $data->sub_category_name = $this->new_sub_category_name;
            $data->category_id = $this->new_category_name;
            $data->save();

            //show success message
            session()->flash('message', 'Saved Successfully!');

            //clear data
            $this->clearData();
        } else {
            //here update data
            $data = SubCategory::find($this->key);
            $data->sub_category_name = $this->new_sub_category_name;
            $data->category_id = $this->new_category_name;
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
        $data = SubCategory::find($id);
        $this->new_sub_category_name = $data->sub_category_name;
        $this->new_category_name = $data->category_id;
        $this->key = $id;
    }

    //clear data
    public function clearData()
    {
        # emty field
        $this->key = 0;
        $this->new_sub_category_name = "";
        $this->new_category_name = "";
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
        $this->pageAction();
        $this->fetchData();
         #if search active
         if (!$this->searchKey) {
            $list_data = DB::table('sub_categories')
                ->select('sub_categories.*','categories.category_name')
                ->leftJoin('categories', 'sub_categories.category_id','categories.id')
                ->latest()
                ->paginate(10);
        } else {
            $list_data = DB::table('sub_categories')
                ->select('sub_categories.*','categories.category_name')
                ->leftJoin('categories', 'sub_categories.category_id','categories.id')
                ->where('sub_categories.sub_category_name', 'LIKE', '%' . $this->searchKey . '%')
                ->orWhere('categories.category_name', 'LIKE', '%' . $this->searchKey . '%')
                ->latest()
                ->paginate(10);
        }
        return view('livewire.sub-category-component',['list_data' => $list_data])->layout('layouts.master');
    }
}
