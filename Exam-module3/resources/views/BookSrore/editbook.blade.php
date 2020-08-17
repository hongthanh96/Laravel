@extends('layouts.form')
@section('title','Trang chủ')

@section('content')

<style>
    .error {
        color: #dc3545;
    }
</style>
<div class="container-fluid row">
    <h2> Chỉnh sửa thông tin sách</h2>
</div>
<form action="{{route('books.update')}}" method="POST">
    @csrf
    @method('put')
    <input type="text" name="id" hidden value="{{$book->id}}">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{$book->name}}">
        @error('name')
        <p class="error"> {{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{$book->title}}">
        @error('title')
        <p class="error"> {{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Desciption</label>
        <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp" value="{{$book->description}}">
        @error('description')
        <p class="error"> {{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Active?</label>
        <select class="form-control" id="active" name="active">
            <option value="1">Đã đọc</option>
            <option value="0">Chưa đọc</option>
        </select>
        @error('active')
        <p class="error"> {{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Catagories</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach ($categories as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
        </select>
        @error('id_categories')
        <p class="error"> {{$message}}</p>
        @enderror
    </div>
    <a href="{{route('books.index')}}" type="submit" class="btn btn-primary">Back</a>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection
