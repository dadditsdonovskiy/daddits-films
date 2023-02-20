<?php

use App\Models\Country;
use Carbon\Carbon;

/**
 * @var array $filmInfo
 */

?>
@extends('layouts.master')
@section('title', 'Dashboard')

@section('header')
    <h1>Country</h1>
@stop
@section('content')
    <div class="mt-5">
        @foreach($filmInfo as $key => $data)
            <div class="row">
                <div class="col-md-2 left-part-sidebar">
                    <div>{{$key}}:</div>
                </div>
                <div class="col-md-10">
                    {{$data}}
                </div>
            </div>
        @endforeach
    </div>
@stop




