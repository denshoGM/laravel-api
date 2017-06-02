@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Listing Users + Tasks</li>
        </ol>
        <input type="hidden" value="{{url('saveCombined')}}" id="url-ajax-combined">
        <div id="field" data-field-id="{{$users}}"></div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold user-title">Users List</h3>
        </div>
        <div class="col-md-12 margin-datatable">
            <table id="tableUsers" class="table table-bordered table-striped responsive">
                {{--Datatable Content--}}
            </table>
        </div>

        <div class="col-md-12 text-center">
            <button class="btn btn-info btn-lg loadBtn"><i class="ibtn fa fa-tasks"></i> Load Tasks for Users?</button>
            <button class="btn btn-success btn-lg saveBtn" style="display: none;"><i class="savebtn fa fa-save"></i> Save Data</button>
        </div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold task-title" style="display: none;">Tasks List</h3>
        </div>
        <div class="col-md-12 margin-datatable">
            <table id="tableTask" class="table table-bordered table-striped responsive">
                {{--Datatable Content--}}
            </table>
        </div>
    </div>
    <!-- /.col -->
@endsection

@section('scripts-extras')
    <script>
        var dataSet = $('#field').data("field-id");
        var taskSet;

        $(document).ready(function () {
            $('#tableUsers').DataTable({
                data: dataSet.results,
                columns: [{
                    title: "Name",
                    data: 'name.first'
                }, {
                    title: "Gender",
                    data: 'gender'
                }, {
                    title: "Last Name",
                    data: 'name.last'
                }, {
                    title: "Email",
                    data: 'email'
                }, {
                    title: "Phone",
                    data: 'phone'
                }, {
                    title: "Registered",
                    data: 'registered'
                }]
            });

            $("button[type=submit], .loadBtn").click(function () {

                if ($(this).text() === ' Reload?'){
                    $(this).prop('disabled', true);
                    window.location.reload();
                } else{
                    $(this).find('.ibtn').removeClass("fa-tasks");
                    $(this).find('.ibtn').addClass('fa-refresh fa-spin');

                    $.ajax({
                        type: 'GET',
                        url: 'https://jsonplaceholder.typicode.com/todos',
                        success: function (response) {
                            taskSet = response;
                            $('.ibtn').removeClass("fa-spin");
                            $('.ibtn').removeClass("fa-refresh").addClass('fa-tasks');
                            $(".loadBtn").html('<i class="ibtn fa fa-check"></i> Loaded!');
                            $(".loadBtn").prop('disabled', true);
                            $('.task-title').show();

                            $('#tableTask').DataTable({
                                destroy: true,
                                data: response,
                                columns: [{
                                    title: "ID",
                                    data: 'id'
                                }, {
                                    title: "User ID",
                                    data: 'userId'
                                }, {
                                    title: "Title",
                                    data: 'title'
                                }, {
                                    title: "Completed",
                                    data: 'completed'
                                }]
                            });

                            $('.saveBtn').show("slow");
                        }
                    });
                }
            });
            $("button[type=submit], .saveBtn").click(function () {

                $.ajax({
                    type: 'POST',
                    url: $('#url-ajax-combined').val(),
                    data: {
                        'users': dataSet,
                        'tasks': taskSet
                    },
                    success: function (response) {
                        alert(response);
                    }
                });

                $(this).hide( "slow", function() {
                    $(".loadBtn").removeClass("btn-info");
                    $(".loadBtn").addClass("btn-warning");
                    $(".loadBtn").prop('disabled', false);
                    $(".loadBtn").html('<i class="ibtn fa fa-bolt"></i> Reload?');
                });
            });
        });
    </script>
    @include('layouts.partials.scriptalert')
@endsection