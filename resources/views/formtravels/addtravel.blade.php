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
                        <h3 class="page-title mt-5">add travel</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/addtravel/save') }}"  method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Num travel</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="number" class="form-control @error('travel_name') is-invalid @enderror" id="travel_name" name="travel_name" value="{{ old('travel_name') }}">
                                        </div>
                                    </div>
                                    <!--new fields-->
                                    <!-- Additional fields here -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Con N°</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="text" class="form-control @error('con') is-invalid @enderror" id="con" name="con" value="{{ old('con') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Provenance</label>
                                            <input type="text" class="form-control @error('provenance') is-invalid @enderror" id="provenance" name="provenance" value="{{ old('provenance') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <input type="text" class="form-control @error('destination') is-invalid @enderror" id="destination" name="destination" value="{{ old('destination') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date exit</label>
                                            <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker @error('date_exit') is-invalid @enderror" id="date_exit" name="date_exit" value="{{ old('date_exit') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date arrivee</label>
                                            <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker @error('date_arrivee') is-invalid @enderror" id="date_arrivee" name="date_arrivee" value="{{ old('date_arrivee') }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>kilometers</label>
                                            <input type="number" class="form-control @error('kilometers') is-invalid @enderror" id="kilometers" name="kilometers" value="{{ old('kilometers') }}">
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>sales </label>
                                            <input type="text" class="form-control @error('sales') is-invalid @enderror" id="sales" name="sales" value="{{ old('sales') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Observation</label>
                                            <textarea class="form-control @error('observation') is-invalid @enderror" id="observation" name="observation" rows="3">{{ old('observation') }}</textarea>
                                        </div>
                                    </div>



                                    <!--how hard fields-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>vehicles</label>
                                            <span class="required-field text-danger">*</span>
                                            <select id="vehicles_select" name="vehicles[]" class="form-control @error('vehicles') is-invalid @enderror"  style="display: none;" multiple>
                                                @foreach($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->id }}">{{ $vehicle->registration_number }}</option>
                                                @endforeach
                                            </select>
                                            @error('vehicles')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4"> <!-- New select field for drivers -->
                                        <div class="form-group">
                                            <label>drivers</label>
                                            <span class="required-field text-danger">*</span>
                                            <select id="vehicles_select" name="drivers[]" class="form-control @error('drivers') is-invalid @enderror" style="display: none;" multiple>
                                                @foreach($drivers as $driver)
                                                    <option value="{{ $driver->id }}">{{ $driver->registration_number }}</option> <!-- Display the name or other property of driver -->
                                                @endforeach
                                            </select>
                                            @error('drivers')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4"> <!-- New select field for clients -->
                                        <div class="form-group">
                                            <label>Clients</label>
                                            <span class="required-field text-danger">*</span>
                                            <select id="vehicles_select" name="clients[]" class="form-control @error('clients') is-invalid @enderror"style="display: none;" multiple>
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name_society }}</option> <!-- Display the name or other property of client -->
                                                @endforeach
                                            </select>
                                            @error('clients')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                <button type="submit" class="btn btn-primary buttonedit1">Create travel</button>
            </div>
        </div>
            </form>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/alltravels/page') }}';">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection