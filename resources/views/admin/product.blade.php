@extends('admin.welcome')
@section('title','Quản Lý Sản Phẩm')
@section('content')
<div>
    <div class="d-flex mt-4 mb-3">
        <h2>Quản lý sản phẩm</h2>
        <div class="ml-auto">
            <a href="{{route('addPro')}}" class="btn btn-primary ">Thêm mới</a>
        </div>
    </div>
    @if(session('thongbao'))
    <p class="alert alert-success">{{session('thongbao')}}</p>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($pro as $key =>$pro)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$pro->name}}</td>
                <td>
                    @if ($pro->status == 1)
                        <a href="{{route('unactive',$pro->id)}}" class="btn btn-success">Active</a>
                    @else
                        <a href="{{route('active',$pro->id)}}" class="btn btn-secondary">Inactive</a>
                    @endif
                <td>
                    <a href="{{route('editPro',$pro->id)}}" class="btn btn-primary">Sửa</a>
                    <a href="{{route('delePro',$pro->id)}}" class="btn btn-danger ml-3">Xóa</a>
                </td>
            </tr>   
            @endforeach
        </tbody>
    </table>
</div>
@endsection