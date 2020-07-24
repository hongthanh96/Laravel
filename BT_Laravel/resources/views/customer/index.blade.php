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
        <div class="row">
            <div class="col-12">
                <h1>Danh sách khách hàng</h1>
                <a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#cityModal">
                    Lọc
                </a>
                @if(isset($totalCustomerFilter))
                <span class="text-muted">
                    {{'Tìm thấy' . ' ' . $totalCustomerFilter . ' '. 'khách hàng:'}}
                </span>
                @endif

                @if(isset($cityFilter))
                <div class="pl-5">
                    <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                        {{ 'Thuộc tỉnh' . ' ' . $cityFilter->name }}</span>
                </div>
                @endif
            </div>

            <div class="col-6">

                <form class="navbar-form navbar-left" action="{{ route('customer.search') }}">

                    @csrf

                    <div class="row">

                        <div class="col-8">

                            <div class="form-group">

                                <input type="text" name = "keyword" class="form-control" placeholder="Search">

                            </div>

                        </div>

                        <div class="col-4">

                            <button type="submit" class="btn btn-default">Tìm kiếm</button>

                        </div>

                    </div>

                </form>

            </div>

        </div>



        @if (!isset($customers)){
        <div>
            <h5>Không tồn tại dữ liệu!</h5>
        </div>
        }

        @else
        <div>
            @if (Session::has('success'))
            <p class="text-success">
                <i class="fas fa-check" aria-hidden="true"></i>{{ Session::get('success') }}</p>

            @endif
        </div>
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
        {{-- <div> {{ $customers->links() }} </div> --}}
        <div><a class="btn btn-primary" href="{{route('customer.create')}}">Thêm khách hàng</a></div>


        <!-- Modal -->
        <div class="modal fade" id="cityModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <form action="{{ route('customer.filterByCity') }}" method="get">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!--Lọc theo tỉnh thành -->
                            <div class="select-by-program">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh
                                        thành</label>
                                    <div class="col-sm-7">
                                        <select class="custom-select w-100" name="city_id">
                                            <option value="">Chọn tỉnh thành</option>
                                            @foreach($cities as $city)
                                            @if(isset($cityFilter))
                                            @if($city->id == $cityFilter->id)
                                            <option value="{{$city->id}}" selected>{{ $city->name }}</option>
                                            @else
                                            <option value="{{$city->id}}">{{ $city->name }}</option>
                                            @endif
                                            @else
                                            <option value="{{$city->id}}">{{ $city->name }}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                </form>
            </div>
            <!--End-->

        </div>
        <div class="modal-footer">
            <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
        </div>
    </div>
    {{-- </div>
    </div>

    </div> --}}


    @endif
    @if (session('status'))
    {{!! session('status') !!}}
    @endif
    @endsection
