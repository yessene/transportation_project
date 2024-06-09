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
                        <h3 class="page-title mt-5">Add vehicle</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/addvehicle/save') }}"  method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >registration_number</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('registration_number') is-invalid @enderror" id="registration_number" name="registration_number" value="{{ old('registration_number') }}">
                                            @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>circulation_date</label>
                                            <span class="required-field text-danger">*</span>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('circulation_date') is-invalid @enderror" name="circulation_date" value="{{ old('circulation_date') }}"> 
                                            </div>
                                         </div>
                                         @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                                    </div>
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mutation </label>
                                            <span class="required-field text-danger">*</span>

                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('mutation') is-invalid @enderror" name="mutation" value="{{ old('mutation') }}"> 
                                            </div>    
                                            @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror                                     </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>validity_date</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('validity_date') is-invalid @enderror" name="validity_date" value="{{ old('validity_date') }}"> 
                                            </div>   
                                        
                                            @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror</div>
                                    </div>
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>brand</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}">
                                        </div>
                                        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}">
                                        </div>
                                        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>category</label>
                                            <span class="required-field text-danger">*</span>

                                            <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                                                <option value="" disabled selected>Select category</option>
                                                <option value="trailer" {{ old('category') === 'trailer' ? 'selected' : '' }}>trailer</option>
                                                <option value="blacksmith" {{ old('category') === 'blacksmith' ? 'selected' : '' }}>blacksmith</option>
                                                <option value="container" {{ old('category') === 'container' ? 'selected' : '' }}>container</option>
                                                <option value="truck" {{ old('category') === 'truck' ? 'selected' : '' }}>truck</option>
                                                <option value="tractor" {{ old('category') === 'tracteur' ? 'selected' : '' }}>tractor</option>
                                            </select>
                                        </div>
                                        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>model</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model') }}">
                                        </div>
                                        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>chassis_number</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="text" class="form-control @error('chassis_number') is-invalid @enderror" id="chassis_number" name="chassis_number" value="{{ old('chassis_number') }}">
                                        </div>
                                        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>weight</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
                                        </div>
                                        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                                    </div>
                                
                                
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                <button type="submit" class="btn btn-primary buttonedit1">Create vehicle</button>
            </div>
        </div>
            </form>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href" ='{{ route('form/allvehicles/page') }}';">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection 