@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Listing Users + Tasks</li>
        </ol>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold customer-title">Users List</h3>
        </div>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold customer-title">Tasks List</h3>
        </div>
    </div>
    <!-- /.col -->
@endsection

@section('scripts-extras')
    @include('layouts.partials.scriptalert')
@endsection