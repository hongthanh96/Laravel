@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title ">
            Add new blog
        </div>
        <form class="text-left" action="{{ route("blog.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" name="name" required>
            </div>
            <div class="form-group">
                <label for="inputTitle">Title</label>
                <input type="text" class="form-control" id="inputTitle" name="title" rows="3" required>
            </div>
            <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea class="form-control" id="ckeditor1" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="inputFileName">File Name</label>
                <input type="file" class="form-control-file" id="inputFile" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>
        <a href="{{ route('welcome.name') }}">
            < Back</a> </div> </div>


            @endsection
