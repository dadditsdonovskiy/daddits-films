@extends('layouts.master')

@section('content')
    <form action="{{ route('directors.save') }}" method="POST">
        <h1>New Director</h1>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Firstname</label>
            {{Form::text('title', null,[
                    'class'      => 'form-control',
                    'name'       => 'firstname',
                    'id'         => 'txt1',
                    'onkeypress' => "return nameFunction(event);"
            ])}}
            @error('firstname')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Lastname</label>
            {!! Form::text('lastname', null, [
                    'class'      => 'form-control',
                    'rows'       => 10,
                    'name'       => 'lastname',
                    'id'         => 'txt',
                    'onkeypress' => "return nameFunction(event);"
             ]) !!}
            @error('lastname')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3" style="max-width: 450px">
            <div class="form-group">
                <label for="content" class="form-label">Birthday</label>
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="birthday"
                           class="form-control @error('birthday') is-invalid @enderror"/>
                    @error('birthday')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
                </div>
            </div>
        </div>
        <div class="text-center float-left" style="float: left">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
@include('director.script')
