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
                        <h4 class="card-title">Add New Flat</h4>
                        <form class="form-sample">
                            <p class="card-description">
                                Flat Information
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Flat Name</label>
                                        <div class="col-sm-9">
                                            <input type="name" name="flat_name" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">GS Member</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gs_member_id"
                                                        id="membershipRadios1" value="NO" checked>
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gs_member_id"
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