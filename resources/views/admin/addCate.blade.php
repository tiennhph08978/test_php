@extends('admin.welcome')
@section('title','Quản Lý danh mục')
@section('content')
<div class="card m-3">
    <div class="card-body">
        <h2 class="mb-4">Thêm danh muc</h2>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('postAddCate')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="inputName">Tên danh mục <span class="ml-1 text-danger">*</span></label>
              <input type="text" class="form-control" id="inputName" name="name" placeholder="Tên danh mục">
            </div>
            <div class="form-group">
              <div class="form-check" id="CheckBoxList">
                <input type="hidden" value="0" name="status" id="gridCheck">
                <input class="form-check-input" type="checkbox" value="1" name="status" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Active
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>
</div>
@endsection