<?php

use App\Models\Country;
use Carbon\Carbon;

?>
@extends('layouts.master')
@section('title', 'Dashboard')

@section('header')
    <h1>Country</h1>
@stop
@section('content')
    <div class="mt-5">
        {{Form::open(['url' => route('imdb.getResult'),'id'=>'imdb-search-form','method'=>'get'])}}
        <div class="col-md-3">
            {{ Form::text('title', null, ['class' => 'form-control'.($errors->has('name') ? 'border-danger':'')]) }}
        </div>
        {{Form::submit('Search!',['class'=>'btn btn-success'])}}
        {{Form::close()}}
    </div>

@stop
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#name").keypress(function (e) {
            if (e.which == 13) {
                $('form#countries-form').submit();
                return false;    //<---- Add this line
            }
        });
    });
</script>



