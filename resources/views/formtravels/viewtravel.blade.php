@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">travel</h3>
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
                                                <tr><td>Num travel</td><td>{{$travel->travel_name}}</td></tr>
                                                <tr><td>Connaissement N°</td><td>{{$travel->con}}</td></tr>
                                                <tr><td>Provenance</td><td>{{$travel->provenance}}</td></tr>
                                                <tr><td>Destination</td><td>{{$travel->destination}}</td></tr>
                                                <tr><td>Date exit</td><td>{{$travel->date_exit}}</td></tr>
                                                <tr><td>Date arrivee</td><td>{{$travel->date_arrivee}}</td></tr>
                                                <tr><td>Nombre jours au Maroc</td><td>{{$travel->j_maroc}}</td></tr>
                                                <tr><td>kilometers</td><td>{{$travel->kilometers}}</td></tr>
                                                
                                                <tr><td>sales</td><td>{{$travel->sales}}</td></tr>
                                                <tr><td>Observation</td><td>{{$travel->observation}}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>more info</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr>
                                                    <td>vehicles</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($travel->vehicles as $vehicle)
                                                            <li>{{$vehicle->registration_number}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>drivers</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($travel->drivers as $driver)
                                                            <li>{{$driver->registration_number}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Clients</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($travel->clients as $client)
                                                            <li>{{$client->name_society}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                               
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
@endsection
