<?php

use App\Models\Film;
use Carbon\Carbon;

/**
 * @var Film $film
 */
?>
@extends('layouts.master')
@section('title', 'Dashboard')

@section('header')
    <h1>Films</h1>
@stop
@section('content')
    <div class="mt-5">
        <a href="{{route('films.show.new.form')}}" class="btn btn-primary">Add new Film</a>
        <table class="table">
            {{Form::open(['url' => route('films.filter'),'id'=>'films-form','method'=>'get'])}}
            @include('components.table-header',['columns'=>$columns])
            {{Form::close()}}
            <tbody>
            @foreach($films as $film)
                <tr>
                    <th scope="row">{{$film->id}}</th>
                    <td>{{$film->title}}</td>
                    <td style="width: 20%">{{$film->description}}</td>
                    <td>{{$film->released_at}}</td>
                    <td>{{ Carbon::parse($film->created_at)->format('Y-m-d') }}</td>
                    <td>{{ Carbon::parse($film->updated_at)->format('Y-m-d') }}</td>
                    <td width="10%">
                        @include('components.actions',['url'=>url("/film/{$film->id}"),'actions'=>['view','edit','delete']])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@include('film.script')

