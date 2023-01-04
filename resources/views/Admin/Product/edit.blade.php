@extends('admin.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('quan-tri.product.update',$data)}}" class="form-group" method="post">
        @csrf
        @method('put')
        Tên sản phẩm:
        <input type="text" name="name" class="form-control" value="{{$data->name}}">
        <br>
        Gia ban:
        <input type="number" name="sellPrice" class="form-control"value="{{$data->sellPrice}}">
        <br>

        Gia nhap:
        <input type="number" name="importPrice" class="form-control"value="{{$data->importPrice}}">
        <br>

        So luong:
        <input type="number" name="quantity" class="form-control"value="{{$data->quantity}}">
        <br>

        Loai:
        <input type="number" name="type" class="form-control"value="{{$data->type}}">
        <br>
        Mo ta:
        <input type="text" name="description" class="form-control"value="{{$data->description}}">
        <br>
        Anh gioi thieu:
        <input type="text" name="intro_img" class="form-control" value="{{$data->intro_img}}">
        <img src="{{$data->intro_img}}" alt="" style="width: 200px;height: 200px">
        <br>
        Phan loai san pham:
        <br>
        <button class="btn btn-success">Xác nhận</button>


    </form>

@endsection
