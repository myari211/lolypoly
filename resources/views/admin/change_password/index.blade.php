@extends('layouts.admin.app', ['title' => 'Change Password','parent' => ''])

@section('title', 'Change Password')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form id="submit-form" action="{{ route('change_password.store') }}">
                <div class="row m-0">
                    <div class="col-sm-12 mb-3">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" placeholder="Enter Email" require readonly>
                            </div>
                            <div class="form-group">
                                <label for="old_password">Old Password*</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" value="" placeholder="Enter Old Password" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password*</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" value="" placeholder="Enter New Password" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password*</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" placeholder="Enter Confirm Password" data-validation="required">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-4" style="width:100%">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection