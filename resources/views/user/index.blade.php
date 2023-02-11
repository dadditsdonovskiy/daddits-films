<?php
use App\Models\Auth\User;

/**
 * @var User $user
 */
?>
@extends('layouts.master')
@section('title', 'Dashboard')

@section('header')
    <h1>Users</h1>
@stop
@section('content')
    <div class="mt-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop


