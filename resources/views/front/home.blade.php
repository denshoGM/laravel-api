@extends('layouts.app')

@section('content')
    <div class="container">
        SOME JSON
        <br>
        {{$users}}
    </div>
@endsection

@section('scripts-extras')
    @include('layouts.partials.scriptalert')
@endsection