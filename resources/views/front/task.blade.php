@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Listing Tasks</li>
        </ol>

        <div id="field" data-field-id="<?php echo e($todos); ?>"></div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold customer-title">Tasks List</h3>
        </div>

        <div class="col-md-12 margin-datatable">
            <table id="tableTask" class="table table-bordered table-striped responsive">
                {{--Datatable Content--}}
            </table>
        </div>
    </div>
@endsection

@section('scripts-extras')
    <script>
        var dataSet = $('#field').data("field-id");

        console.log(dataSet);
        $(document).ready(function () {
            $('#tableTask').DataTable({
                data: dataSet,
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
        });
    </script>
    @include('layouts.partials.scriptalert')
@endsection