@extends('admin.main')
@section('content')
    <table class='table'>
        <thead>
            <tr>
                <th style="width: 40px">ID</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ngày đặt</th>
                <th style="width: 120px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $key => $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>
                    <a class="btn btn-primany btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                    <i class="fas fa-eye edit-icon"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $customers  ->links() !!}
    </div>
@endsection
