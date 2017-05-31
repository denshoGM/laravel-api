@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Listar Usuarios</li>
        </ol>

        <div id="field" data-field-id="{{$users}}"></div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold customer-title">Lista de Usuarios</h3>
        </div>

        <div class="col-md-12 margin-datatable">
            <table id="tableUsers" class="table table-bordered table-striped responsive">
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
        });
    </script>
    @include('layouts.partials.scriptalert')
@endsection