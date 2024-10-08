@extends('layouts.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">{{$title}}</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table  class="datatable display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Road</th>
                                                <th>Block</th>
                                                <th>Area</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            var i = 1;
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('buildings.index') }}",
                columns: [
                    {
                        "render": function () {
                            return i++;
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'road', name: 'road'},
                    {data: 'block', name: 'block'},
                    {data: 'area', name: 'area'},
                    {data: 'address', name: 'address'},
                    {data: 'action', name: 'action'},
                ]
            });
        });
    </script>
@endsection
