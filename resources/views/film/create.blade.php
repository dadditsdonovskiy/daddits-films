@extends('layouts.master')

@section('content')
        <form action="{{ route('film.save') }}" method="POST">
        <h1>New Film</h1>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                id="title"
                name="title"
                class=" form-control @error('title') is-invalid @enderror"
            >
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Description</label>
            <textarea
                id="tinymce-editor"
                name="description"
                class=" form-control @error('description') is-invalid @enderror">

            </textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="text-center float-left" style="float: left">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
@include('film.script')
