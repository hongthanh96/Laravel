@extends('layouts.app')
@section('content')
<div>
    <div>
        <h1>Danh sách khách hàng thuộc các tỉnh thành</h1>
    </div>
    <div>
        @if (!isset($cities)){
        <h5>Dữ liệu không tồn tại!</h5>
        @else{
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên tỉnh thành</th>
                    <th scope="col">Số khách hàng</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>

            @forelse ($cities as $key=>$city)
            <tbody>
                <tr>
                    <th>{{ ++$key }}</th>
                    <td>{{ $city->name }}</td>
                    <td>{{ count($city->customers) }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('cities.edit', $city) }}">Sửa</a>
                        <a class="btn btn-danger" href="{{ route('cities.destroy',$city) }}" onclick="return confirm('Bạn chắc chắn xóa??')">Xóa</a>
                    </td>
                </tr>
            </tbody>
            @empty
                <tr>
                    <td colspan="4" >Không có tỉnh thành nào tồn tại!</td>
                </tr>
            @endforelse
        </table>
        <a class="btn btn-primary" href="{{ route('cities.create') }}">Thêm mới</a>

        @endif

    </div>
</div>
@endsection
