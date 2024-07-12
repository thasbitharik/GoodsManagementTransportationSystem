<?php

namespace App\Http\Livewire;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Route;
use Livewire\WithPagination;
use Livewire\Component;

class EmployeeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $page_action =[];
    public $searchKey;
    public $status;
    public $selected_id;

    public $key = 0;
    public $message = "";

    public $employee_fname = "";
    public $employee_sname = "";
    public $employee_tp = "";
    public $employee_email = "";
    public $address = "";

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
            $data = Employee::find($this->delete_id);
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
               $data = Employee::find( $this->selected_id );
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
           //validate data
           $this->validate(
               [
                   'employee_fname' => 'required|max:255',
                   'employee_sname' => 'required|max:255',
                   'employee_tp' => 'required|max:14',
                   'employee_email' => 'required|email',
                   'address' => 'required',


               ]
           );

           //check id value and execute
           if ($this->key == 0) {
               //here insert data
               $data = new Employee();
               $data->employee_fname = $this->employee_fname;
               $data->employee_sname = $this->employee_sname;
               $data->employee_tp = $this->employee_tp;
               $data->employee_email = $this->employee_email;
               $data->address = $this->address;
               $data->save();

               //show success message
               session()->flash('message', 'Saved Successfully!');

               //clear data
               $this->clearData();
               $this->closeModel();
           } else {
               //here update data
               $data = Employee::find($this->key);
               $data->employee_fname = $this->employee_fname;
               $data->employee_sname = $this->employee_sname;
               $data->employee_tp = $this->employee_tp;
               $data->employee_email = $this->employee_email;
               $data->address = $this->address;
               $data->save();

               //show success message
               session()->flash('message', ' Update Successfuly!');

               //clear data
               $this->clearData();
               $this->closeModel();

           }
       }

       public function updateRecord($id)
       {
           # code...
           $this->openModel();
           $data = Employee::find($id);
           $this->employee_fname = $data->employee_fname;
           $this->employee_sname = $data->employee_sname;
           $this->employee_tp = $data->employee_tp;
           $this->employee_email = $data->employee_email;
           $this->address = $data->address;
           $this->key = $id;
       }

        //clear data
        public function clearData()
        {
            # emty field
            $this->key = 0;
            $this->employee_fname = "";
            $this->employee_sname = "";
            $this->employee_tp = "";
            $this->employee_email = "";
            $this->address = "";
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
        if(!$this->searchKey){
            $list_data= DB :: table('employees')
            ->select('employees.*')
            ->latest()
            ->paginate(10);
        }
        else{
            $list_data= DB::table('employees')
            ->select('employees.*')
            ->where('employees.employee_fname','LIKE','%'.$this->searchKey.'%')
            ->orWhere('employees.employee_email','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('employees.employee_tp','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('employees.address','LIKE', '%'.$this->searchKey.'%')
            ->orWhere('employees.employee_sname','LIKE', '%'.$this->searchKey.'%')
            ->latest()
            ->paginate(10);
        }
        return view('livewire.employee-component',['list_data' => $list_data])->layout('layouts.master');
    }
}
