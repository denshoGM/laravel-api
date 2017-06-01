@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Historical Data</li>
        </ol>

        <div class="col-lg-12">
            <h3 class="pull-left font-bold customer-title">Users Task History</h3>
        </div>

        Some History
    </div>
@endsection

@section('scripts-extras')
    @include('layouts.partials.scriptalert')
@endsection