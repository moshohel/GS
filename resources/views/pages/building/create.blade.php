@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href={{ asset("assets/vendors/select2/select2.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css") }}>
@stop

@section('content')
<div class="main-panel">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Building</h4>
                        <form method="post" action="{{ route('buildings.store') }}" class="form-sample">
                            {{csrf_field()}}
                            <p class="card-description">
                                Building Information
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Building Name</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Number of Floor</label>
                                        <div class="col-sm-9">
                                            <input name="number_of_floor" type="number" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Road Name</label>
                                        <div class="col-sm-9">
                                            <input name="road" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Block</label>
                                        <div class="col-sm-9">
                                            <input name="block" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Area</label>
                                        <div class="col-sm-9">
                                            <input name="area" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Type</label>
                                        <div class="col-sm-9">
                                            <select name="type" class="form-control">
                                                <option>Hospital</option>
                                                <option>Educational</option>
                                                <option>Individual</option>
                                                <option>Commercial</option>
                                                <option>Residential</option>
                                                <option>Commercial + Residential</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address </label>
                                        <div class="col-sm-9">
                                            <input name="address" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Holding Number</label>
                                        <div class="col-sm-9">
                                            <input  name="holding" type="number" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Manager</label>
                                        <div class="col-sm-9">
                                            <select name="manager_id" class="form-control">
                                                <option  value="1">Manager 1</option>
                                                <option  value="2">Manager 2</option>
                                                <option  value="3">Manager 3</option>
                                                <option  value="4">Manager 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Spcial Rate</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input name="special_rate_radio" type="radio" class="form-check-input" name="membershipRadios"
                                                        id="membershipRadios1" value="NO" checked>
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input name="special_rate_radio" type="radio" class="form-check-input" name="membershipRadios"
                                                        id="membershipRadios2" value="YES">
                                                    YES
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src={{asset("assets/vendors/select2/select2.min.js")}}></script>
<script src={{asset("assets/vendors/typeahead.js/typeahead.bundle.min.js")}}></script>
@stop
