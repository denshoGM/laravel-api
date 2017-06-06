@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Listing Tasks</li>
        </ol>

        <div id="field" data-field-id="{{$todos}}"></div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold task-title">Tasks List</h3>
        </div>

        <div class="col-md-12 margin-datatable">
            <table id="tableTask" class="table table-bordered table-striped responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Title</th>
                    <th>Status</th>
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
            $('#tableTask tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input class="searchFooter" type="text" placeholder="Search '+title+'"/>' );
            });

            var table = $('#tableTask').DataTable({
                data: dataSet,
                columns: [
                    {data: 'id'},
                    {data: 'userId'},
                    {data: 'title'},
                    {data: 'completed'}
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