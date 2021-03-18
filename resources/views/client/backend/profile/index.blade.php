@extends('layouts.client')

@push('custom-css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/client/vendor/daterangepicker/daterangepicker.css')}}" />
@endpush

@section('content')
<div id="content" class="py-4">
    <div class="container">
        <div class="row">

            @include('client.backend.partials.sidebar')

            <!-- Middle Panel
      ============================================= -->
            <div class="col-lg-9">

                <!-- Personal Details
        ============================================= -->
                <div class="bg-light shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 mb-3">Personal Details <a href="#edit-personal-details"
                            data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i
                                class="fas fa-edit mr-1"></i>Edit</a></h3>
                    <div class="row">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                        <p class="col-sm-9 text-capitalize">
                            @if(Auth::user()->userinfo->first_name && Auth::user()->userinfo->last_name)
                                {{Auth::user()->userinfo->first_name}} {{Auth::user()->userinfo->last_name}}
                            @else
                                {{Auth::user()->name}}
                            @endif
                        </p>
                    </div>
                    <div class="row">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                        <p class="col-sm-9">{{Auth::user()->userinfo->dob}}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Address</p>
                        <p class="col-sm-9">{{Auth::user()->userinfo->address}} {{Auth::user()->userinfo->state}} {{Auth::user()->userinfo->city}} {{Auth::user()->userinfo->zip_code}} {{Auth::user()->userinfo->country}}
                        </p>
                    </div>
                </div>
                <!-- Edit Details Modal
        ================================== -->
                <div id="edit-personal-details" class="modal fade " role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">Personal Details</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                    aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="personaldetails" action="{{route('client.profile.personal.update')}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" value="{{Auth::user()->userinfo->first_name}}" class="form-control"
                                                    data-bv-field="first_name" id="first_name" name="first_name" required
                                                    placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" value="{{Auth::user()->userinfo->last_name}}" class="form-control"
                                                    data-bv-field="last_name" id="last_name" name="last_name" required
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="dob">Date of Birth</label>
                                                <div class="position-relative">
                                                    <input id="dob" name="dob" value="{{Auth::user()->userinfo->dob}}" type="text"
                                                        class="form-control" required placeholder="Date of Birth ex. DD-MM-YYYY">
                                                    <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h3 class="text-5 font-weight-400 mt-3">Address</h3>
                                            <hr>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" value="{{Auth::user()->userinfo->address}}"
                                                    class="form-control" data-bv-field="address" id="address" required
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input id="city" name="city" value="{{Auth::user()->userinfo->city}}" type="text" class="form-control"
                                                    required placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="input-zone">State</label>
                                                <input id="state" name="state" value="{{Auth::user()->userinfo->state}}" type="text" class="form-control"
                                                    required placeholder="State">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="zip_code">Zip Code</label>
                                                <input id="zip_code" name="zip_code" value="{{Auth::user()->userinfo->zip_code}}" type="text" class="form-control"
                                                    required placeholder="Zip Code">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input id="country" name="country" value="{{Auth::user()->userinfo->country}}" type="text" class="form-control"
                                                    required placeholder="Country">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block mt-2" type="submit">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Personal Details End -->

                <!-- Account Settings
        ============================================= -->
                <div class="bg-light shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 mb-3">Account Settings <a href="#edit-account-settings"
                            data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i
                                class="fas fa-edit mr-1"></i>Edit</a></h3>
                    <div class="row">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Language</p>
                        <p class="col-sm-9 text-capitalize">{{Auth::user()->userinfo->language}}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Account Status</p>
                        <p class="col-sm-9">
                            @if(Auth::user()->status)
                            <span class="bg-success text-white rounded-pill d-inline-block px-2 mb-0">
                                <i class="fas fa-check-circle"></i> Active
                            </span>
                            @else
                            <span class="bg-danger text-white rounded-pill d-inline-block px-2 mb-0">
                                <i class="fas fa-times"></i> In-Active
                            </span>
                            @endif
                            
                        </p>
                    </div>
                </div>
                <!-- Edit Details Modal
        ================================== -->
                <div id="edit-account-settings" class="modal fade " role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">Account Settings</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                    aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="accountSettings" action="{{route('client.profile.account.update')}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="language">Language</label>
                                                <select class="custom-select" id="language" name="language">
                                                    <option value="english">English</option>
                                                    <option value="spanish">Spanish</option>
                                                    <option value="chinese">Chinese</option>
                                                    <option value="russian">Russian</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="col-12">
                                            <div class="form-group">
                                                <label for="accountStatus">Account Status</label>
                                                <select class="custom-select" id="accountStatus" name="language_id">
                                                    <option value="1">Active</option>
                                                    <option value="2">In Active</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <button class="btn btn-primary btn-block mt-2" type="submit">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Account Settings End -->

                <!-- Email Addresses
        ============================================= -->
                <div class="bg-light shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 mb-3">Email Addresses 
                        {{-- <a href="#edit-email" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a> --}}
                    </h3>
                    <div class="row">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID 
                            <span class="text-muted font-weight-500">(Primary)</span>
                        </p>
                        <p class="col-sm-9">{{Auth::user()->email}}</p>
                    </div>
                </div>
                <!-- Edit Details Modal
        ================================== -->
                {{-- <div id="edit-email" class="modal fade " role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">Email Addresses</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                    aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="emailAddresses" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="emailID">Email ID <span
                                                        class="text-muted font-weight-500">(Primary)</span></label>
                                                <input type="text" value="{{Auth::user()->email}}"
                                                    class="form-control" data-bv-field="emailid" id="emailID" required
                                                    placeholder="Email ID">
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn-link text-uppercase d-flex align-items-center text-1 float-right mb-3"
                                        href="#"><span class="text-3 mr-1"><i class="fas fa-plus-circle"></i></span>Add
                                        another
                                        email</a>
                                    <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Email Addresses End -->

                <!-- Phone
        ============================================= -->
                <div class="bg-light shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 mb-3">Phone <a href="#edit-phone" data-toggle="modal"
                            class="float-right text-1 text-uppercase text-muted btn-link"><i
                                class="fas fa-edit mr-1"></i>Edit</a>
                    </h3>
                    <div class="row">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile <span
                                class="text-muted font-weight-500">(Primary)</span></p>
                        <p class="col-sm-9">{{Auth::user()->userinfo->phone}}</p>
                    </div>
                </div>
                <!-- Edit Details Modal
        ================================== -->
                <div id="edit-phone" class="modal fade " role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">Phone</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                    aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="phone" action="{{route('client.profile.phone.update')}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="phone">Mobile <span
                                                        class="text-muted font-weight-500">(Primary)</span></label>
                                                <input type="text" name="phone" value="{{Auth::user()->userinfo->phone}}" class="form-control"
                                                    data-bv-field="mobilenumber" id="phone" required
                                                    placeholder="Mobile Number">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <a class="btn-link text-uppercase d-flex align-items-center text-1 float-right mb-3"
                                        href="#"><span class="text-3 mr-1"><i class="fas fa-plus-circle"></i></span>Add
                                        another
                                        Phone</a> --}}
                                    <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Phone End -->

                <!-- Security
        ============================================= -->
                <div class="bg-light shadow-sm rounded p-4">
                    <h3 class="text-5 font-weight-400 mb-3">Security <a href="#change-password" data-toggle="modal"
                            class="float-right text-1 text-uppercase text-muted btn-link"><i
                                class="fas fa-edit mr-1"></i>Edit</a>
                    </h3>
                    <div class="row">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">
                            <label class="col-form-label">Password</label>
                        </p>
                        <p class="col-sm-9">
                            {{-- <input type="password" class="form-control-plaintext" data-bv-field="password" id="password"
                                value="EnterPassword" readonly> --}}
                            {{Auth::user()->password}}
                        </p>
                    </div>
                </div>
                <!-- Edit Details Modal
        ================================== -->
                <div id="change-password" class="modal fade " role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">Change Password</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                    aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="changePassword" action="{{route('client.profile.password.update')}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="text" class="form-control" data-bv-field="current_password"
                                            id="current_password" name="current_password" required placeholder="Enter Current Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Enter Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm New Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password">

                                    </div>
                                    <button class="btn btn-primary btn-block mt-4" type="submit">Update
                                        Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Security End -->

            </div>
            <!-- Middle Panel End -->
        </div>
    </div>
</div>
@endsection

@push('custom-js')
<script src="{{asset('assets/client/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/client/vendor/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#dob').daterangepicker({
            singleDatePicker: true,
            "showDropdowns": true,
            autoUpdateInput: false,
            maxDate: moment().add(0, 'days'),
        }, function (chosen_date) {
            $('#dob').val(chosen_date.format('MM-DD-YYYY'));
        });
    })

</script>
@endpush
