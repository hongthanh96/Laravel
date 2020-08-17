@extends('layouts.form')
@section('title','Trang chủ')

@section('content')

<style>
    .error{
        color: #dc3545;
    }
</style>
<div class="container-fluid row">
    <h2 class="col-7"> Quản lí sách</h2>
    <div class="col-3 ">
        <form action="{{ route('books.search') }}" method="get" class="row">
        <select name="category_id" class="col-7">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-success col-5" value="Lọc theo loại">
        </form>
    </div>
    <div class="col-2 text-center">
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
            Create
        </button>
    </div>
</div>


{{-- nav --}}
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tất cả sách</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sách đã đọc</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Sách chưa đọc</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
      {{-- tất cả sách --}}
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Active</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date Create</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $key => $item)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->active}}</td>
                    <td>{{$item->category->title}}</td>
                    <td>{{$item->created_at}}</td>
                <td><a href="{{route('books.edit',$item->id)}}" class="btn btn-primary"> Edit </a>
                    <a href="{{ route('books.destroy',$item->id) }}" class="btn btn-danger"> Delete </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- sách đã đọc --}}
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date Create</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book_act as $key => $item)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->category->title}}</td>
                    <td>{{$item->created_at}}</td>
                <td><a href="{{route('books.edit',$item->id)}}" class="btn btn-primary"> Edit </a> <button class="btn btn-danger"> Delete </button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- sách chưa đọc --}}
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date Create</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book_noact as $key => $item)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->category->title}}</td>
                    <td>{{$item->created_at}}</td>
                <td><a href="{{route('books.edit',$item->id)}}" class="btn btn-primary"> Edit </a> <button class="btn btn-danger"> Delete </button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>


@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{ route('books.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        @error('name')
                            <p class="error"> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                        @error('title')
                            <p class="error"> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Desciption</label>
                        <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
