<?php

use App\Models\Director;
use Carbon\Carbon;

/**
 * @var Director $director
 * @var array $columns
 */
?>
@extends('layouts.master')
@section('title', 'Dashboard')

@section('header')
    <h1>Directors</h1>
@stop
@section('content')
    <div class="mt-5">
        <a href="{{route('film.show.new.form')}}" class="btn btn-primary">Add new Director</a>
        <table class="table">
            {{Form::open(['url' => route('directors.filter'),'id'=>'directors-form','method'=>'get'])}}
            @include('components.table-header',['columns'=>$columns])
            {{Form::close()}}
            <tbody>
            @foreach($directors as $director)
                <tr>
                    <th scope="row">{{$director->id}}</th>
                    <td>{{$director->firstname}}</td>
                    <td>{{$director->lastname}}</td>
                    <td>{{$director->birthday_date}}</td>
                    <td>{{ Carbon::parse($director->created_at)->format('Y-m-d') }}</td>
                    <td>{{ Carbon::parse($director->updated_at)->format('Y-m-d') }}</td>
                    <td width="30%">
                        @include('components.actions',['url'=>url("/film/{$director->id}"),'actions'=>['view','edit','delete']])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span class="sss">

    {{ $directors->links() }}
    </span>
    </div>

@stop
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#firstname, #lastname").keypress(function (e) {
            if (e.which == 13) {
                $('form#directors-form').submit();
                return false;    //<---- Add this line
            }
        });
    });
</script>



