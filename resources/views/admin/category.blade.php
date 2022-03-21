@extends('admin.welcome')
@section('title','Quản Lý danh mục')
@section('content')
<div class="card m-3">
    <div class="d-flex m-2">
        <h2>Quản Lý danh mục</h2>
        <div class="ml-auto">
            <a href="{{route('addCate')}}" class="btn btn-primary ">Thêm mới</a>
        </div>
       
    </div>
    @if(session('thongbao'))
    <p class="alert alert-success">{{session('thongbao')}}</p>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($cate as $key=>$cate)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$cate->name}}</td>
                    <td> 
                        @if ($cate->status == 1)
                        <a href="{{route('unactive',$cate->id)}}" class="btn btn-success">Active</a>
                        @else
                        <a href="{{route('active',$cate->id)}}" class="btn btn-secondary">Inactive</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('editCate',$cate->id)}}" class="btn btn-primary">Sửa</a>
                        <a href="{{route('deleCate',$cate->id)}}" class="btn btn-danger ml-3">Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection