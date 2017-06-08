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
        <input type="hidden" value="{{url('history-detail')}}" id="url-ajax-detail">
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
            <div class="modal-dialog" role="document" style="width: 40%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="detailModalLabel">User Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 " align="center"> <img id="u_image" alt="User Pic" src="{{asset('images/default-300x300.png')}}" class="img-circle img-responsive"> </div>
                            <div class=" col-md-8 col-lg-8 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td id="detailName"></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name:</td>
                                        <td id="detailLast"></td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td id="detailGender"></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td id="detailPhone"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td id="detailEmail"><a href="mailto:info@support.com">info@support.com</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 margin-datatable">
                            <table id="tableDetail" class="table table-bordered table-striped responsive">
                            </table>
                        </div>
                        <button type="button" class="btn btn-default text-center" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-extras')
    <script>
        var dataSet = $('#field').data("field-id");
        var msg = "Are you sure do you want to delete all of this records?";
        var msgd = "Are you sure do you want to delete this record?";

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
                            return '<a href="#" onclick="historyDetail('+full.user_id+')" class="btn btn-blue btn-xs" data-toggle="tooltip" title="Extra"><i class="fa fa-info-circle"></i></a> ' +
                                '<a href="http://laravel-api.dev/delete-history/'+full.id+'/'+full.user_id+'" onclick="return confirm(msg)" class="btn btn-red btn-xs" data-toggle="tooltip" title="Eliminar Todo"><i class="fa fa-trash"></i></a>';

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
                    url: $('#url-ajax-combined').val()+"/"+0+"/"+0,
                    success: function (response) {
                        toastr.error(response, '', {timeOut: 5000, closeButton: false, progressBar: true, positionClass: "toast-top-full-width"});
                        setTimeout(
                            function() {
                                window.location.reload();
                            }, 5000);
                    }
                });
            });
        });

        function historyDetail(user_id) {
            $.ajax({
                type: 'GET',
                url: $('#url-ajax-detail').val()+"/"+user_id,
                success: function (response) {
                    $('#detailName').html(response[0].name);
                    $('#detailLast').html(response[0].lastName);
                    $('#detailGender').html(response[0].gender);
                    $('#detailPhone').html(response[0].phone);
                    $('#detailEmail').html($("<a>").attr("href", "mailto:" + response[0].email).text(response[0].email));
                    $("#u_image").attr("src",response[0].picture);

                    $('#tableDetail').DataTable({
                        data: response[1],
                        lengthChange: false,
                        pageLength: 5,
                        destroy: true,
                        columns: [{
                            title: "Task  ID",
                            data: 'id'
                        }, {
                            title: "Title",
                            data: 'title'
                        }, {
                            title: "Status",
                            data: 'status'
                        },{
                            title: "Action",
                            data: 'user_id',
                            "className":"left",
                            "render":function(data, type, full, meta){
                                return '<a href="http://laravel-api.dev/delete-history/'+full.id+'/'+0+'" onclick="return confirm(msgd)" class="btn btn-blue btn-xs" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></a>';

                            }
                        }],
                        columnDefs: [
                        {
                            "render": function (data) {
                                var status = 'Pending';
                                if(data === 1){
                                    status = 'Completed'
                                }
                                return status;
                            },
                            "targets": 2
                        }]
                    });
                    $('#detailModal').modal();
                }
            });
        }
    </script>
    @include('layouts.partials.scriptalert')
@endsection