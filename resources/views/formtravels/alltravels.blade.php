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
                            <h4 class="card-title float-left mt-2">travels</h4> 
                            @if (auth()->check() && auth()->user()->role === 'admin')   <a href="{{ route('form/addtravel/page') }}" class="btn btn-primary float-right veiwbutton">add travel</a> @endif
                        </div>
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
                                            <th>name travel</th>
                                            <th>Vehicles </th>
                                            <th>drivers </th>
                                            <th>Clients </th>
                                        
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alltravels as $travels )
                                        <tr>
                                            <td hidden class="id">{{ $travels->id }}</td>
                                            <td>{{ $travels->travel_name }}</td>
                                            <td>
                                                @foreach($travels->vehicles as $vehicle)
                                                    <a href="{{ url('form/viewvehicle/'.$vehicle->id) }}" target="_blank" style="color: black;">{{ $vehicle->registration_number  }}</a>
                                                    @if (!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($travels->drivers as $driver)
                                                    <a href="{{ url('form/viewdriver/'.$driver->id) }}" target="_blank" style="color: black;">{{ $driver->Registration_Number }}</a>
                                                    @if (!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($travels->clients as $client)
                                                    <a href="{{ url('form/viewclient/'.$client->id) }}" target="_blank" style="color: black;"> {{ $client->name_society }}</a>
                                                    @if (!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"  href="{{ url('form/travel/edit/'.$travels->id) }}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item travelDelete" href="#" data-toggle="modal" data-target="#delete_asset">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Delete
                                                        </a> 
                                                        <a class="dropdown-item" href="{{ route('form/travel/view', ['id' => $travels->id]) }}">
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
                        <form action="{{ route('form/travel/delete') }}" method="POST">
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
        $(document).on('click','.travelDelete',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_fileupload').val(_this.find('.fileupload').text());
        });
    </script>
    @endsection
@endsection
