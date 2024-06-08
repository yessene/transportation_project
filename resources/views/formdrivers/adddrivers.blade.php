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
                        <h3 class="page-title mt-5">Add driver</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/adddriver/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Registration_number</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('Registration_number') is-invalid @enderror" id="Registration_number" name="Registration_number" value="{{ old('Registration_number') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Last_name</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('Last_name') is-invalid @enderror" id="Last_name" Last_name="Last_name" value="{{ old('Last_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>First_name</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('First_name') is-invalid @enderror" name="First_name" value="{{ old('First_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>ID_Number</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('ID_Number') is-invalid @enderror" name="ID_Number" value="{{ old('ID_Number') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control @error('Gender') is-invalid @enderror" id="Gender" name="Gender">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="male" {{ old('Gender') === 'male' ? 'selected' : '' }}>male</option>
                                        <option value="female" {{ old('Gender') === 'female' ? 'selected' : '' }}>Femme</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control @error('Address') is-invalid @enderror" id="Address" name="Address" value="{{ old('Address') }}">
                                </div>
                            </div>
                           
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control @error('City') is-invalid @enderror" id="City" name="City" value="{{ old('City') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date_of_Birth</label>
                                    <span class="required-field text-danger">*</span>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker @error('Date_of_Birth') is-invalid @enderror" id="Date_of_Birth" name="Date_of_Birth" value="{{ old('Date_of_Birth') }}">
                                    </div>
                                </div>
                            </div>
                           
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Marital_Status</label>
                                    <select class="form-control @error('Marital_Status') is-invalid @enderror" id="Marital_Status" name="Marital_Status">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="single" {{ old('Marital_Status') === 'single' ? 'selected' : '' }}>single</option>
                                        <option value="married" {{ old('Marital_Status') === 'married' ? 'selected' : '' }}>married</option>
                                        <option value="divorced" {{ old('Marital_Status') === 'divorced' ? 'selected' : '' }}>divorced</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Transport</label>
                                    <select class="form-control @error('Transport') is-invalid @enderror" id="Transport" name="Transport">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="truck" {{ old('Transport') === 'truck' ? 'selected' : '' }}>truck</option>
                                        <option value="van" {{ old('Transport') === 'van' ? 'selected' : '' }}>Van</option>

                                        <option value="mini truck" {{ old('Transport') === 'mini truck' ? 'selected' : '' }}>Mini truck</option>
                                        <option value="big truck" {{ old('Transport') === 'big truck' ? 'selected' : '' }}>big truck</option>
                                    </select>
                                </div>
                            </div>
            
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Type</label>
                                    <span class="required-field text-danger">*</span>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="intern" {{ old('type') === 'intern' ? 'selected' : '' }}>intern</option>
                                        <option value="extern" {{ old('type') === 'extern' ? 'selected' : '' }}>extern</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date depart</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker @error('Date_depart') is-invalid @enderror" id="Date_depart" name="Date_depart" value="{{ old('Date_depart') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Social_Security</label>
                                    <input type="text" class="form-control @error('Social_Security') is-invalid @enderror" id="Social_Security" name="Social_Security" value="{{ old('Social_Security') }}">
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>File Upload</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('fileupload') is-invalid @enderror" id="image" name="image" onchange="previewImage(event)">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div id="preview-container" style="display: none;">
                                    <img id="preview-image" src="#" alt="preview image" style="max-width: 200px; max-height:200px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary buttonedit1">Create driver</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/alldrivers/page') }}'">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    
@endsection