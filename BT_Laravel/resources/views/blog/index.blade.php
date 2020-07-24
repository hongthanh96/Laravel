@extends('layouts.app')
        @section('content')
        @notifyCss
        <div class="content">
            <div class="title m-b-md">
                Blogs List
            </div>
            <button><a href="{{ route('blog.create') }}">Thêm Blogs</a></button>
            @if(!isset($blogs))
            <h5 class="text-primary">Dữ liệu không tồn tại!</h5>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Người đăng bài</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Ngày đăng bài</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as  $key => $blog)
                    <tr>
                        <td scope="row">{{ ++$key }}</td>
                        <td>{{ $blog->name }}</td>
                        <td><a href="{{route('blog.show',$blog)}}">{{ $blog->title }}</a></td>

                        <td>
                            <img src="{{ asset('/upload/' . $blog->image) }}" alt="" style="width: 150px">
                        </td>
                        <td>{{ $blog->created_at }}</td>
                        <td>
                           <button><a href="{{route('blog.edit',$blog)}}">Sửa</a></button> <button onclick="return confirm('Bạn muốn xóa?')"><a href="{{route('blog.destroy',$blog)}}">Xóa</a></button>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <h5 class="text-primary">Hiện tại chưa có blog nào được tạo!</h5>
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
            @endif

        </div>


    @include('notify::messages')
    @notifyJs
    @endsection



