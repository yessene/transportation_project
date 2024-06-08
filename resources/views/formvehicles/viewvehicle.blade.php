@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">vehicle</h3>
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
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Informations generales</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr><td>registration_number</td><td>{{ $vehicle->registration_number }}</td></tr>
                                                <tr><td>model</td><td>{{ $vehicle->model }}</td></tr>
                                                <tr><td>Type</td><td>{{ $vehicle->type }}</td></tr>
                                                <tr><td>category</td><td>{{ $vehicle->category }}</td></tr>
                                                <tr><td>Model</td><td>{{ $vehicle->Model }}</td></tr>
                    
                                                <tr><td>circulation_date</td><td>{{ $vehicle->circulation_date}}</td></tr>
                                               
                                                <tr><td>Mutation </td><td>{{ $vehicle->mutation }}</td></tr>
                                                <tr><td>validity_date</td><td>{{ $vehicle->validity_date }}</td></tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Plus d'informations</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                        
                                                <tr><td>chassis_number</td><td>{{ $vehicle->chassis_number }}</td></tr>
                                              
                                                

                                                <tr><td>weight</td><td>{{ $vehicle->weight }}</td></tr>
                                               

                                                
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
@endsection