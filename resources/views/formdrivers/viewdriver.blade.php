@extends('layouts.master')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">driver</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <span>Personal info</span>
                                            </h5><br>
                                            <div class="row justify-content-center">
                                                @if($driver->image)
                                                    <img src="{{ asset('images/'.$driver->image) }}" alt="driver Image" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; border: 4px solid #ddd; margin-bottom: 20px;">
                                                @else
                                                    <img src="{{ asset('images/default.png') }}" alt="Default Image" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; border: 4px solid #ddd; margin-bottom: 20px;">
                                                @endif
                                            </div>
                                            <table class="table table-striped mt-5">
                                                <tr><td>Last_Name</td><td>{{ $driver->Last_Name }}</td></tr>
                                                <tr><td>First_Name</td><td>{{ $driver->First_Name }}</td></tr>
                                                <tr><td>ID_Number</td><td>{{ $driver->ID_Number }}</td></tr>
                                                <tr><td>Phone</td><td>{{ $driver->Phone }}</td></tr>
                                                <tr><td>Gender</td><td>{{ $driver->Gender }}</td></tr>
                                                <tr><td>Nationality</td><td>{{ $driver->Nationality }}</td></tr>
                                                <tr><td>Address</td><td>{{ $driver->Address }}</td></tr>
                                                <tr><td>City</td><td>{{ $driver->City }}</td></tr>
                                                <tr><td>Date_of_Birth</td><td>{{ $driver->Date_of_Birth }}</td></tr>
                                                <tr><td>Marital_Status</td><td>{{ $driver->Marital_Status }}</td></tr>
                                              
                                                <tr><td>Transport</td><td>{{ $driver->Transport }}</td></tr>
                                                <tr><td>Type</td><td>{{ $driver->Type }}</td></tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                
                                    
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection