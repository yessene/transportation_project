@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Client</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>general information</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr><td>name_society </td><td>{{ $client->name_society }}</td></tr>
                                                <tr><td>last_name</td><td>{{ $client->last_name }}</td></tr>
                                                <tr><td>first_name</td><td>{{ $client->first_name }}</td></tr>
                                                <tr><td>Email</td><td>{{ $client->email }}</td></tr>
                                                <tr><td>phone 1</td><td>{{ $client->phone1 }}</td></tr>
                                                <tr><td>phone 2</td><td>{{ $client->phone2 }}</td></tr>
                                                <tr><td>Type</td><td>{{ $client->type }}</td></tr>
                                                <tr><td>date_relation</td><td>{{ $client->date_relation }}</td></tr>
                                                <tr><td>country </td><td>{{ $client->country }}</td></tr>
                                                <tr><td>city</td><td>{{ $client->city}}</td></tr>
                                                <tr><td>address</td><td>{{ $client->address }}</td></tr>
                                                <tr><td>Code postal</td><td>{{ $client->postal_code }}</td></tr>
                                                <tr><td>Notes</td><td>{{ $client->notes }}</td></tr>

                                                
                                                
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
