@extends('layouts.app')

@section('style-css')
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #1f76b0
        }

        .profile-button {
            background: #1D00AF;
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #1f76b0;
        }

        .profile-button:focus {
            background: #1f76b0;
            box-shadow: none
        }

        .profile-button:active {
            background: #1f76b0;
            box-shadow: none
        }

        .back:hover {
            color: #1f76b0;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #1fc8e3;
            color: #fff;
            cursor: pointer;
            border: solid 1px #1fc8e3;
        }
    </style>
@endsection

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{ asset('img/Graphicloads-Flat-Finance-Person.ico') }}"><span class="font-weight-bold">{{ $user->name }}</span><span class="text-black-50">{{ $user->email }}</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="{{ $user->name }}"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" placeholder="surname" value="{{ $user->name }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="{{ $user->name }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="{{ $user->name }}"></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="{{ $user->name }}" placeholder="state"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value="{{ $user->name }}"></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value="{{ $user->name }}"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
