@extends('layouts.app')
@section('content')

<style>
    input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
    </style>
<div>
<h2>Thay đổi thông tin khách hàng</h2>
<form action="{{route('blog.update', $blog)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div>
        <label for="">Tên</label>
        <input type="text" name="name" value="{{$blog->name}}">
    </div>
    <div>
        <label for="">Tiêu đề</label>
        <input type="text" name="dob" value="{{$blog->title}}">
    </div>
    <div>
        <label for="">Nội dung</label>
        <textarea name="email" value="{{$blog->description}}" id="ckeditor2" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="">Hình ảnh</label>
        <input type="file" name="imagess" >
    </div>
    <div>
        <input type="submit" value="Edit">
    </div>
</form>
</div>
@endsection
