@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div>

        <h1>Danh sách khách hàng</h1>

        @if (!isset($customers)){
        <div>
            <h5>Không tồn tại dữ liệu!</h5>
        </div>
        }

        @else

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tỉnh thành</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $key =>$customer)
                <tr>
                    <td>{{++$key}}</td>
                    <td><a href="{{route('customer.show',$customer)}}">{{$customer->name}}</a></td>
                    <td>{{$customer->dob}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->city->name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('customer.edit',$customer)}}">Sửa</a>
                        <a class="btn btn-danger" href="{{route('customer.destroy',$customer)}}"
                            onclick="return confirm('Bạn muốn xóa?')">Xóa</a>
                    </td>
                </tr>

                @empty{
                <tr>
                    <td colspan="5">Không có khách hàng nào! </td>
                </tr>


                @endforelse


            </tbody>
        </table>
        <div><a class="btn btn-primary" href="{{route('customer.create')}}">Thêm khách hàng</div>
    </div>
    @endif
    @if (session('status'))
    {{!! session('status') !!}}
    @endif
    @endsection
