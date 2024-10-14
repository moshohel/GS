@extends('layouts.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xl-4 card-body text-center" style="height: 15ch;">
                    <a href="#" class="btn btn-primary text-center" style="width: 100%; height: 100%;">
                        <p style="margin-top: 1rem">Add Floor Info</p>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4 card-body text-center " style="height: 15ch;">
                    <a href="#" class="btn btn-primary text-center" style="width: 100%; height: 100%;">
                        <p style="margin-top: 1rem">Add Flat Info</p>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4 card-body text-center" style="height: 15ch;">
                    <a href="#" style="width: 100%; height: 100%;" class="btn btn-primary text-center">
                        <p style="margin-top: 1rem">Cancelation</p>
                    </a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Building Info Change</h4>
                        <form method="PUT" action="{{ route('buildings.update', $building->id) }}" class="form-sample">
                            {{csrf_field()}}
                            <p class="card-description">
                                Building Information
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Building Name</label>
                                        <div class="col-sm-9">
                                            <input name="name" value="{{ $building->name }}" type="text"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Number of Floor</label>
                                        <div class="col-sm-9">
                                            <input name="number_of_floor" value="{{ $building->number_of_floor }}"
                                                type="number" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Road Name</label>
                                        <div class="col-sm-9">
                                            <input name="road" type="text" value="{{ $building->road }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Block</label>
                                        <div class="col-sm-9">
                                            <input name="block" type="text" value="{{ $building->block }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Area</label>
                                        <div class="col-sm-9">
                                            <input name="area" type="text" value="{{ $building->area }}"
                                                class="form-control" />
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
                                            <input name="address" type="text" value="{{ $building->address }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Holding Number</label>
                                        <div class="col-sm-9">
                                            <input name="holding" type="number" value="{{ $building->holding }}"
                                                class="form-control" />
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
                                                <option value="1">Manager 1</option>
                                                <option value="2">Manager 2</option>
                                                <option value="3">Manager 3</option>
                                                <option value="4">Manager 4</option>
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
                                                    <input name="special_rate_radio" type="radio"
                                                        class="form-check-input" name="membershipRadios"
                                                        id="membershipRadios1" value="NO" checked>
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input name="special_rate_radio" type="radio"
                                                        class="form-check-input" name="membershipRadios"
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