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
        <a href="{{route('film.show.new.form')}}" class="btn btn-primary">Add new Film</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date of release</th>
                <th scope="col">Added at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <th scope="row">{{$film->id}}</th>
                    <td>{{$film->title}}</td>
                    <td>{{$film->description}}</td>
                    <td>{{$film->released_at}}</td>
                    <td>{{ Carbon::parse($film->created_at)->format('Y-m-d') }}</td>
                    <td>
                    <td>
                        @include('components.actions',['url'=>url("/film/{$film->id}"),'actions'=>['view','edit','delete']])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop


