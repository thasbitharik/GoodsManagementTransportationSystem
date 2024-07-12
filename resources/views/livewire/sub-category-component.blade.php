<div>
    {{-- Success is as dangerous as failure. --}}
    <style>
        .bg-info {
            background-color: #ff5f13 !important;
        }
     </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-info text-white-all">
            {{-- <li class="breadcrumb-item active"><a href="/elders-view"><i class="fa fa-arrow-left"></i> </a></li> --}}
            <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Create-New</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i>Category</li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-12 col-md-4">

        </div>

        <div class="col-12 col-md-8">

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="searchKey" wire:keyup="fetchData" placeholder="" aria-label="">
                    <div class="input-group-append">
                        <button class="btn btn-primary" wire:click="fetchData">Search</button>
                    </div>

                    @if (in_array('Save', $page_action))
                    <button id="formOpen" wire:click="openModel" class="btn btn-info ml-1"><i class="fa fa-plus" aria-hidden="true"></i> Create-New
                    </button>
                    @endif

                </div>
            </div>
        </div>


    </div>




    <div class="row">

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="p-4">
                    <h4>Category</h4>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport">
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($list_data as $row)
                            <tr>
                                <td>{{ $list_data->firstItem()+ $loop->iteration - 1 }}</td>
                                <td>{{ $row->category_name }}</td>
                                <td>{{ $row->sub_category_name }}</td>

                                <td>
                                    @if (in_array('Delete', $page_action))
                                    <a href="#" class="text-danger m-2" wire:click="deleteOpenModel({{ $row->id }})"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    @endif

                                    @if (in_array('Update', $page_action))
                                    <a href="#" class="text-info" wire:click="updateRecord({{ $row->id }})"><i class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    @endif

                                </td>
                            </tr>
                            @endforeach

                        </table>
                        <div class="row">
                            <div class="col-6 ml-2">
                                Showing {{$list_data->firstItem()}} - {{$list_data->lastItem()}} of
                                {{$list_data->total()}}
                            </div>
                        </div>

                        <div class= "float-right mr-3">
                            {{$list_data->links()}}
                        </div>
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
                        <h5 class="modal-title" id="formModal">Create Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="position-relative form-group">
                            <label for="new_category_name">
                                <font color="red">*</font>Category
                            </label>
                            <select class="form-control @error('new_category_name') is-invalid @enderror" name="new_category_name" id="new_category_name" wire:model="new_category_name">
                                <option value="" selected disabled>Please select</option>
                                @foreach ($category_list as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @error('new_category_name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror


                        </div>

                        <div class="form-group">
                            <label>Sub Category</label>
                            <input type="text" class="form-control" wire:model="new_sub_category_name" placeholder="Sub Category">
                            @error('new_sub_category_name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror

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
        <div wire:ignore.self class="modal fade" id="delete-model" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="formModal">Warning!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">
                            If you want to remove this data, <b>you can't undone</b>, It will be affected that relevent
                            records!
                        </p>

                        <div class="text-right">
                            <button type="button" wire:click="deleteCloseModel" class="btn btn-success m-t-15 waves-effect">No </button>
                            <button type="button" wire:click="deleteRecord" class="btn btn-danger m-t-15 waves-effect">Yes</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- model end --}}

    </div>




</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#formOpen").click(function() {
            $("#div3").fadeIn(500);
        });

        $("#formClose").click(function() {
            $("#div3").fadeOut();
        });
    });

</script>
