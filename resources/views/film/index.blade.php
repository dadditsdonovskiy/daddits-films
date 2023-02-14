<?php

use App\Models\Film;
use Carbon\Carbon;

/**
 * @var Film $film
 */
$searchColumns = [
    ['width' => '5%', 'name' => 'id', 'placeholder' => 'ID', 'title' => 'Id'],
    ['width' => '#', 'name' => 'title', 'placeholder' => 'Title', 'title' => 'Title'],
    ['width' => '20%', 'name' => 'description', 'placeholder' => 'Description', 'title' => 'Description'],
    ['width' => '10%', 'name' => 'releasedAt', 'placeholder' => 'Released At', 'title' => 'Released At'],
    ['width' => '10%', 'name' => 'addedAt', 'placeholder' => 'Added At', 'title' => 'Added At'],
];
?>
@extends('layouts.master')
@section('title', 'Dashboard')

@section('header')
    <h1>Films</h1>
@stop
@section('content')
    <div class="mt-5">
        <a href="{{route('film.show.new.form')}}" class="btn btn-primary">Add new Film</a>
        <table class="table">
            @include('components.table-header',['columns'=>$searchColumns])
            <tbody>
            @foreach($films as $film)
                <tr>
                    <th scope="row">{{$film->id}}</th>
                    <td>{{$film->title}}</td>
                    <td style="width: 20%">{{$film->description}}</td>
                    <td>{{$film->released_at}}</td>
                    <td>{{ Carbon::parse($film->created_at)->format('Y-m-d') }}</td>
                    <td>
                        @include('components.actions',['url'=>url("/film/{$film->id}"),'actions'=>['view','edit','delete']])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop


