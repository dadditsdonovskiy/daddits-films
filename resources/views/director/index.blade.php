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
    <h1>Directors</h1>create.blade.php
@stop
@section('content')
    <div class="mt-5">
        <a href="{{route('directors.show.new.form')}}" class="btn btn-primary mb-2">Add new Director</a>
        <table class="table">
            {{Form::open(['url' => route('directors.filter'),'id'=>'directors-form','method'=>'get'])}}
            @include('components.table-header',['columns'=>$columns])
            {{Form::close()}}
            <tbody>
            @if ($directors->count() == 0)
                <tr>
                    <td colspan="5">No Directors to display.</td>
                </tr>
            @endif
            @foreach($directors as $director)
                <tr>
                    <th scope="row">{{$director->id}}</th>
                    <td>{{$director->firstname}}</td>
                    <td>{{$director->lastname}}</td>
                    <td>{{$director->birthday_date}}</td>
                    <td>{{$director->films()->count()}}</td>
                    <td>{{ Carbon::parse($director->created_at)->format('Y-m-d') }}</td>
                    <td>{{ Carbon::parse($director->updated_at)->format('Y-m-d') }}</td>
                    <td width="10%">
                        @include('components.actions',['url'=>url("/director/{$director->id}"),'actions'=>['view','edit','delete'],'nameToDelete'=>$director->fullName])
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
@include('director.script')



