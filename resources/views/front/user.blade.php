@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Listing Users</li>
        </ol>

        <div id="field" data-field-id="{{$users}}"></div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold user-title">Users List</h3>
        </div>

        <div class="col-md-12 margin-datatable">
            <table id="tableUsers" class="table table-bordered table-striped responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registered</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Registered</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('scripts-extras')
    <script>
        var dataSet = $('#field').data("field-id");

        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#tableUsers tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input class="searchFooter" type="text" placeholder="Search '+title+'" />' );
            });

            var table = $('#tableUsers').DataTable({
                data: dataSet.results,
                responsive: false,
                columns: [
                    {data: 'name.first'},
                    {data: 'name.last'},
                    {data: 'gender'},
                    {data: 'email'},
                    {data: 'phone'},
                    {data: 'registered'}
                ]
            });

            // Apply the search
            table.columns().every( function () {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                });
            });
        });
    </script>
    @include('layouts.partials.scriptalert')
@endsection