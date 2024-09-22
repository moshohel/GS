@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href={{ asset("assets/vendors/select2/select2.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css") }}>
@stop

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Floors</h4>
                        <form class="form-sample">
                            <p class="card-description">
                                Floors Information
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Floor Number</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="floor_number" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Number Of Flats</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="number_of_flats" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Floor Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="floor_type">
                                                <option>Category1</option>
                                                <option>Category2</option>
                                                <option>Category3</option>
                                                <option>Category4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status">
                                                <option>Category1</option>
                                                <option>Category2</option>
                                                <option>Category3</option>
                                                <option>Category4</option>
                                            </select>
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