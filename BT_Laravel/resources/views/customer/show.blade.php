@extends('layouts/app')
@section('content')

<body>
    <h2>CHI TIẾT KHÁCH HÀNG</h2>
<p><span>Tên: </span>{{$customer->name ?? ''}}</p>
<p><span>Ngày sinh: </span>{{$customer->dob ?? ''}}</p>
<p><span>Email: </span>{{$customer->email ?? ''}}</p>
<p><span>Tỉnh thành: </span>{{$customer->city->name ?? ''}}</p>
<button class="btn btn-primary" onclick="window.history.go(-1);return false">Trở về</button>

@endsection
