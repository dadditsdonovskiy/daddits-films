@extends('layouts.master')

@section('content')
    <form action="{{ route('films.save') }}" method="POST">
        <h1>New Film</h1>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            {{Form::text('title', null,[
                    'class'      => 'form-control',
                    'name'       => 'title',
                    'id'         => 'txt1',
                    //'onkeypress' => "return nameFunction(event);"
            ])}}
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Description</label>
            {!! Form::textarea('description', null, [
                    'class'      => 'form-control',
                    'rows'       => 10,
                    'name'       => 'description',
                    'id'         => 'txt',
                    //'onkeypress' => "return nameFunction(event);"
             ]) !!}
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3" style="max-width: 450px">
            <div class="form-group">
                <label for="content" class="form-label">releasedAt</label>
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="releasedDate"
                           class="form-control @error('releasedDate') is-invalid @enderror"/>
                    @error('releasedDate')
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
        <div class="mb-3">
            <div class="form-group">
                <label for="director_id">Directed by</label>
                {!!Form::select('directors[]',$directors,null,['multiple'=>"multiple", 'class'=>'select2-multiple form-control','placeholder'=>null]) !!}
            </div>
        </div>
        <div class="text-center float-left" style="float: left">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
@include('film.script')
