<?php
use App\Models\Film;

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
            </tr>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <th scope="row">{{$film->id}}</th>
                    <td>{{$film->title}}</td>
                    <td>{{$film->description}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop


