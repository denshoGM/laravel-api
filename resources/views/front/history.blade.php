@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Historical Data</li>
        </ol>

        @if (session('status'))
            <input type="hidden" value="{{Session::get('msg')}}" id="msg-delete">
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
                        <th>UserID</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Total Tasks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>UserID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th colspan="2"></th>
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
        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="detailModalLabel">The Sun Also Rises</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 text-center">
                            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R"
                                 name="aboutme" width="140" height="140" border="0" class="img-circle">
                        </div>
                        <p>
                            Please confirm you would like to add
                            <b><span id="fav-title">The Sun Also Rises</span></b>
                            to your favorites list.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info pull-right">Add to Favorites</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-extras')
    <script>
        var dataSet = $('#field').data("field-id");
        var msg = "Are you sure do you want to delete all this records?";

        if ($('#msg-delete').val() != undefined){
            toastr.error($('#msg-delete').val(), 'Done', {timeOut: 5000, closeButton: true, progressBar: true, positionClass: "toast-bottom-right"});
        }

        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#tableHistory tfoot th').each( function () {
                var title = $('#tableHistory tfoot th').eq( $(this).index() ).text();
                if($(this).index() != 3 && $(this).index() != 4)
                    $(this).html( '<input class="searchFooter" type="text" placeholder="Search '+title+'" />' );
            });

            var table = $('#tableHistory').DataTable({
                data: dataSet,
                columns: [
                    {data: 'user_id'},
                    {data: 'name'},
                    {data: 'lastName'},
                    {data: 'totalTasks'},
                    {data: 'id',
                        "className":"left",
                        "render":function(data, type, full, meta){
                            return '<a href="#" onclick="historyDetail('+full.user_id+')" class="btn btn-blue btn-xs"><i class="fa fa-info-circle"></i></a> ' +
                                '<a href="http://laravel-api.dev/delete-history/'+full.id+'/'+full.user_id+'" onclick="return confirm(msg)" class="btn btn-red btn-xs"><i class="fa fa-trash"></i></a>';

                        }
                    }
                ],
                columnDefs: [
                    { orderable: false, targets: 4 },
                    { className: 'dt-body-center', targets: [4] }
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

        function historyDetail(user_id) {
            $('#detailModal').modal();
        }
    </script>
    @include('layouts.partials.scriptalert')
@endsection