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
        @if(empty($films))
            any films
        @else
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">Imdb Id</th>
                </tr>
                </thead>
                <tbody>
                @foreach($films as $key=> $film)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$film['title']}}</td>
                        <td>{{$film['year']}}</td>
                        <td>
                            <a
                                href="{{route('imdb.view.film.details',['id'=>$film['imdbId']])}}"
                                class="btn btn-info"
                            >View details</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif()
    </div>

@stop




