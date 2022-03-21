@extends('admin.welcome')
@section('title','Quản Lý sản phẩm')
@section('content')
<div class="card m-3">
    <div class="card-body">
        <h2 class="mb-4">Thêm sản phẩm</h2>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('postEditPro',$pro->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="inputName">Tên sản phẩm <span class="ml-1 text-danger">*</span></label>
              <input type="text" class="form-control" id="inputName" value="{{$pro->name}}" name="name" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="inputName">Tên danh mục <span class="ml-1 text-danger">*</span></label>
                <select name="cate_id" class="form-control">
                    @foreach($cate as $cate)
                    <option <?php if($cate->id == $pro->cate_id):?>
                                selected
                            <?php endif?>
                             value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
              <div class="form-group">
                <label for="inputName">Giá </label>
                <input type="text" class="form-control" id="inputName" value="{{$pro->price}}" name="price" placeholder="Giá">
              </div>
              <div class="form-group">
                <label for="inputName">Số lượng </label>
                <input type="text" class="form-control" id="inputName" value="{{$pro->amount}}" name="amount" placeholder="Số lượng">
              </div>
              <div class="form-group">
                <label for="inputName">Ảnh</label>
                <input type="file" class="form-control" name="image" value="{{$pro->image}}" onchange="changeImg(this)" id="image">
                <img id="avatar" class="thumbnail" width="300px" src='{{ asset("/upload/avatar/$pro->image") }}'>

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
@section('script')
<script>
    function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
</script>
@endsection