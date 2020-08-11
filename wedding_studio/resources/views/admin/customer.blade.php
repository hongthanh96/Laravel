@extends('admin.layouts')
@section('content')
    <div>
        <table class="table table-striped" id="CustomerTB">
            <thead>
                <th>Mã khách hàng</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Is Admin</th>
                <th>Phân quyền</th>
                <th>Trạng thái</th>
            </thead>
            <tbody id="tbody">
                <td><a href="" class="btn btn-primary"></a></td>
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')

<script src="{{ asset('js/adminCustomer.js') }}"></script>

@endpush
