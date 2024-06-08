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
                        <h3 class="page-title mt-5">add client</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/addclient/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>society name </label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('name_society') is-invalid @enderror" id="name_society" name="name_society" value="{{ old('name_society') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>last name</label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="nom" value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>first name</label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="prenom" value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of 1st relation</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('date_relation') is-invalid @enderror" name="date_relation" value="{{ old('date_relation') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>phone 1</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('phone1') is-invalid @enderror" id="phone1" name="phone1" value="{{ old('phone1') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>phone 2</label>
                                            <input type="text" class="form-control @error('phone2') is-invalid @enderror" id="phone2" name="phone2" value="{{ old('phone2') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>country</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>city</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>address</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <span class="required-field text-danger">*</span>
                                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                                <option value="" disabled selected>Select Type</option>
                                                <option value="import" {{ old('type') === 'import' ? 'selected' : '' }}>import</option>
                                                <option value="export" {{ old('type') === 'export' ? 'selected' : '' }}>export</option>
                                                <option value="import-export" {{ old('type') === 'import-export' ? 'selected' : '' }}>import-export</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>postal code</label>
                                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Notes</label>
                                            <input type="text" class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" value="{{ old('notes') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary buttonedit1">Create Client</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allclients/page') }}';">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection 