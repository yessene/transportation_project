        @extends('layouts.master')
        @section('menu')

        @section('content')
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                       
                            <div class="col">
                                <div class="mt-5">
                                    
                                    <h4 class="card-title float-left mt-2">vehicles</h4>  @if (auth()->check() && auth()->user()->role === 'admin')<a href="{{ route('form/addvehicle/page') }}" class="btn btn-primary float-right veiwbutton">add vehicle</a> @endif </div>
                                </div>
                            </div>
                           

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-table">
                                    <div class="card-body booking_card">
                                        <div class="table-responsive">
                                            <table class="datatable table table-stripped table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th hidden>Id</th>
                                                        <th>registration n</th>
                                                        <th>model</th>
                                                        <th>Type</th>
                                                        <th>category</th>
                                                        

                                                        <th class="text-right">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allvehicles as $vehicles )
                                                    <tr>
                                                        <td hidden class="id">{{ $vehicles->id }}</td>
                                                        <td>{{ $vehicles->registration_number }}</td>
                                                        <td>{{ $vehicles->model }}</td>
                                                        <td>{{ $vehicles->type}}</td>
                                                        <td>{{ $vehicles->category }}</td>
                                                       
                                                    
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item"  href="{{ url('form/vehicle/edit/'.$vehicles->id) }}">
                                                                        <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item vehicleDelete" href="#" data-toggle="modal" data-target="#delete_asset">
                                                                        <i class="fas fa-trash-alt m-r-5"></i> Delete
                                                                    </a> 
                                                                    <a class="dropdown-item" href="{{ route('form/vehicle/view', ['id' => $vehicles->id]) }}">
                                                                        <i class="far fa-eye m-r-5"></i> View
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- delete model --}}
                    <div id="delete_asset" class="modal fade delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <form action="{{ route('form/vehicle/delete') }}" method="POST">
                                        @csrf
                                        <img src="{{ URL::to('assets/img/sent.png') }}" alt="" width="50" height="46">
                                        <h3 class="delete_class">Are you sure want to delete this Asset?</h3>
                                        <div class="m-t-20">
                                            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                            <input class="form-control" type="hidden" id="e_id" name="id" value="">
                                            <input class="form-control" type="hidden" id="e_fileupload" name="fileupload" value="">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end delete model --}}
                </div>
                @section('script')
                {{-- delete model --}}
                <script>
                    $(document).on('click','.vehicleDelete',function()
                    {
                        var _this = $(this).parents('tr');
                        $('#e_id').val(_this.find('.id').text());
                        $('#e_fileupload').val(_this.find('.fileupload').text());
                    });
                </script>
                @endsection

        @endsection