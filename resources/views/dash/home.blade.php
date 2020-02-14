@extends('layouts.app')

@section('pageTitle') Dashboard @stop

@section('content')

    <div class="col-md-12">
        <div class="row">->getFullUrl();
        @foreach($results as $result)
            <img src="{!! $result->getFullUrl() !!}" >
        @endforeach
        </div>
    </div>

@stop
