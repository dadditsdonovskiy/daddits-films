<?php

use App\Models\Country;
use Carbon\Carbon;

/**
 * @var Country $country
 * @var array $columns
 */
?>
@extends('layouts.master')
@section('title', 'Dashboard')

@section('header')
    <h1>Country</h1>
@stop
@section('content')
    <div class="mt-5">
        <a href="{{route('film.show.new.form')}}" class="btn btn-primary mb-1">Add new Country</a>
        <table class="table">
            {{Form::open(['url' => route('countries.filter'),'id'=>'countries-form','method'=>'get'])}}
            @include('components.table-header',['columns'=>$columns])
            {{Form::close()}}
            <tbody>
            @if ($countries->count() == 0)
                <tr>
                    <td colspan="5">No Countries to display.</td>
                </tr>
            @endif
            @foreach($countries as $country)
                <tr>
                    <th scope="row">{{$country->id}}</th>
                    <td>{{$country->name}}</td>
                    <td>{{ Carbon::parse($country->created_at)->format('Y-m-d') }}</td>
                    <td>{{ Carbon::parse($country->updated_at)->format('Y-m-d') }}</td>
                    <td width="30%">
                        @include('components.actions',['url'=>url("/country/{$country->id}"),'actions'=>['view','edit','delete']])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span class="sss">

    {{ $countries->links() }}
    </span>
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



