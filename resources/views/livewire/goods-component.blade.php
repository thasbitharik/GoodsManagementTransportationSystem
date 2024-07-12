
<div>
    <style>
        .bg-info {
            background-color: #ff5f13 !important;
        }
     </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-info text-white-all">
            <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i>Goods</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 col-md-4">
        </div>

        <div class="col-12 col-md-8">

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="searchKey" wire:keyup="fetchData" placeholder="Search Customers Here..."
                        aria-label="">
                    <div class="input-group-append">
                        <button class="btn btn-primary" wire:click="FetchData">Search</button>
                    </div>
                    {{-- <button id="formOpen" wire:click="openModel" class="btn btn-info ml-1"><i class="fa fa-plus"
                            aria-hidden="true"></i> Create-New
                    </button> --}}
                </div>
            </div>
        </div>


    </div>

    @if (session()->has('message'))
    <div x-transition.duration.500ms x-data="{open: true}" x-init="setTimeout(() => {open = false}, 1500) "
        x-show="open" class="alert alert-success" id="alert" style="height:40px">
        {{-- <button type="button" class="close btn btn-sm" data-dismiss="alert" style="margin-top: -7px">X</button>
        --}}
        <div style="margin-top: -3px"> {{ session('message') }} </div>
    </div>
    @endif


    <div class="row">

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="p-4">
                    <h4>Customer </h4>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Tracking Number</th>
                                <th>Goods Name</th>
                                <th>Sub Category</th>
                                <th>Customer</th>
                                <th>Drop Off Address</th>
                                <th>Drop Off Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            {{-- @php($x = 1) --}}
                            @foreach ($list_data as $row)
                            <tr class="text-center">
                                <td>{{ $list_data->firstItem() + $loop->iteration -1 }}</td>
                                <td>{{$row->tracking_number}}</td>
                                <td>{{$row->good_name}}</td>
                                <td>{{$row->sub_category_name}}</td>
                                <td>{{$row->customer_fname}}</td>
                                <td>{{$row->dropoff_address}}</td>
                                <td>{{$row->dropoff_date}}</td>
                                <td>

                                    @if($row->status==0)
                                    <button class="btn btn-sm btn-warning" wire:click="statusChangeModel('{{ $row->id }}','{{ $row->status }}')">
                                        Processing
                                    </button>
                                    @elseif($row->status==1)
                                    <button class="btn btn-sm btn-primary" wire:click="statusChangeModel('{{ $row->id }}','{{ $row->status }}')">
                                        Taken Away
                                    </button>
                                    @elseif($row->status==2)
                                    <button class="btn btn-sm btn-danger" wire:click="statusChangeModel('{{ $row->id }}','{{ $row->status }}')">
                                        WareHouse
                                    </button>
                                    @elseif($row->status==3)
                                    <button class="btn btn-sm btn-dark" wire:click="statusChangeModel('{{ $row->id }}','{{ $row->status }}')">
                                        Dispatched
                                    </button>
                                    @elseif($row->status==4)
                                    <button class="btn btn-sm btn-success" wire:click="statusChangeModel('{{ $row->id }}','{{ $row->status }}')">
                                        Delivered
                                    </button>
                                    @endif
                                </td>

                                <td>

                                    @if (in_array('Update', $page_action))
                                    <a href="#" class="text-info" wire:click="updateRecord({{ $row->id }})"><i
                                            class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    @endif

                                    {{-- @if (in_array('Delete', $page_action))
                                    <a href="#" class="text-danger m-2" wire:click="deleteOpenModel({{ $row->id }})"><i
                                            class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    @endif --}}

                                </td>
                            </tr>
                            {{-- @php($x++) --}}
                            @endforeach
                        </table>
                        <div class="row">
                            <div class="col-6 ml-2">
                                Showing {{$list_data->firstItem()}} - {{$list_data->lastItem()}} of {{$list_data->total()}}
                            </div>
                        </div>
                        <div class="float-right mr-3">
                            {{$list_data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="status-model" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="formModal">Change Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" wire:model="status">
                                    <option value="0">Processing</option>
                                    <option value="1">Taken Away</option>
                                    <option value="2">WareHouse</option>
                                    <option value="3">Dispatched</option>
                                    <option value="4"> Delivered</option>

                                </select>
                                @error('status')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="text-right">
                            <button type="button" wire:click="closeStatusChangeModel" class="btn btn-success m-t-15 waves-effect">No </button>
                            <button type="button" wire:click="saveStatusChangeModel" class="btn btn-danger m-t-15 waves-effect">Yes</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

          {{-- Insert model here --}}
          <div wire:ignore.self class="modal fade" id="insert-model" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Employee</label>
                                <select class="form-control" wire:model="employeeName">
                                   @foreach ($employee_list as $employee)
                                   <option value="" selected disabled>Please select</option>
                                   <option value="{{$employee->id}}">{{$employee->employee_fname}} {{$employee->employee_sname}}</option>
                                   @endforeach

                                </select>
                                @error('employeeName')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        <div class="text-right">
                            <button type="button" wire:click="closeModel" class="btn btn-danger m-t-15 waves-effect">Close </button>
                            <button type="button" wire:click="saveData" class="btn btn-primary m-t-15 waves-effect">Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- model end --}}

        {{-- delete model here --}}
        {{-- <div wire:ignore.self class="modal fade" id="delete-model" tabindex="-1" role="dialog"
            aria-labelledby="formModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="formModal">Warning!</h5>
                        <button type="button" class="close btn" style="font-size:27px" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">
                            If you want to remove this data, <b>you can't undo</b>, It will be affected that
                            relevant
                            records!
                        </p>

                        <div class="text-right">
                            <button type="button" wire:click="deleteCloseModel"
                                class="btn btn-success m-t-15 waves-effect">No </button>
                            <button type="button" wire:click="deleteRecord"
                                class="btn btn-danger m-t-15 waves-effect">Yes</button>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}
        {{-- model end --}}
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#formOpen").click(function() {
            $("#div3").fadeIn(500);
        });
    });
         // this is for admin status
window.addEventListener('status-show-form', event => {
        $('#status-model').modal('show');
    });
    window.addEventListener('status-hide-form', event => {
        $('#status-model').modal('hide');
    });

</script>
