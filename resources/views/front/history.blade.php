@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Historical Data</li>
        </ol>

        @if (session('status'))
            <input type="hidden" value="{{ Session::get('msg') }}" id="msg-delete">
        @endif

        <input type="hidden" value="{{url('delete-history')}}" id="url-ajax-combined">
        <div id="field" data-field-id="<?php echo e($history); ?>"></div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold customer-title">Users Task History</h3>
        </div>

        <div class="col-md-12 margin-datatable">
            <table id="tableHistory" class="table table-bordered table-striped responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="col-md-12 text-center">
            <button class="btn btn-danger btn-lg deleteBtn"><i class="dbtn fa fa-exclamation-circle"></i> Delete All</button>
        </div>
        <div class="col-md-12">
            <br>
        </div>
    </div>
@endsection

@section('scripts-extras')
    <script>
        var dataSet = $('#field').data("field-id");
        var msg = "¿Está seguro que desea eliminar esta Configuración?";

        console.log($('#msg-delete').val());

        if ($('#msg-delete').val() != undefined){
            toastr.error($('#msg-delete').val(), '', {timeOut: 5000, closeButton: true, progressBar: true, positionClass: "toast-top-full-width"});
        }

        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#tableHistory tfoot th').each( function () {
                var title = $('#tableHistory tfoot th').eq( $(this).index() ).text();
                if($(this).index() !=5)
                    $(this).html( '<input class="searchFooter" type="text" placeholder="Search '+title+'" />' );
            });

            var table = $('#tableHistory').DataTable({
                data: dataSet,
                columns: [
                    {data: 'name'},
                    {data: 'lastName'},
                    {data: 'email'},
                    {data: 'title'},
                    {data: 'status'},
                    {data: 'id'}
                ],
                columnDefs: [
                    { className: "dt-body-center", "targets": [5] },
                    {
                        "render": function (data) {
                            var status = 'Pending';
                            if(data === 1){
                                status = 'Completed'
                            }
                            return status;
                        },
                        "targets": 4
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="http://laravel-api.dev/delete-history/'+data+'" onclick="return confirm(msg)" class="btn btn-blue btn-xs eliminar"><i class="fa fa-trash"></i></a>';
                        },
                        "targets": 5
                    }
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

            $("button[type=submit], .deleteBtn").click(function () {
                $.ajax({
                    type: 'GET',
                    url: $('#url-ajax-combined').val()+"/"+0,
                    success: function (response) {
                        toastr.error(response, '', {timeOut: 5000, closeButton: true, progressBar: true, positionClass: "toast-top-full-width"});
                        setTimeout(
                            function() {
                                window.location.reload();
                            }, 5000);
                    }
                });
            });
        });
    </script>
    @include('layouts.partials.scriptalert')
@endsection