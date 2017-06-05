@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Historical Data</li>
        </ol>

        <div id="field" data-field-id="<?php echo e($history); ?>"></div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold customer-title">Users Task History</h3>
        </div>

        <div class="col-md-12 margin-datatable">
            <table id="tableHistory" class="table table-bordered table-striped responsive">
                {{--Datatable Content--}}
            </table>
        </div>
    </div>
@endsection

@section('scripts-extras')
    <script>
        var dataSet = $('#field').data("field-id");

        $(document).ready(function () {
            $('#tableHistory').DataTable({
                data: dataSet,
                columns: [{
                    title: "Name",
                    data: 'name'
                }, {
                    title: "Last Name",
                    data: 'lastName'
                }, {
                    title: "Email",
                    data: 'email'
                }, {
                    title: "Task Title",
                    data: 'title'
                }, {
                    title: "Completed",
                    data: 'status'
                }],
                columnDefs: [
                    {
                        "render": function (data) {
                            var status = 'false';
                            if(data === 1){
                                status = 'true'
                            }
                            return status;
                        },
                        "targets": 4
                    }
                ]
            });
        });
    </script>
    @include('layouts.partials.scriptalert')
@endsection