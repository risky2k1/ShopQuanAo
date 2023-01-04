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
    <form action="{{route('quan-tri.product.store')}}" class="form-group" method="post">
        @csrf
        Tên sản phẩm:
        <input type="text" name="name" class="form-control">
        <br>
        Gia ban:
        <input type="number" name="sellPrice" class="form-control">
        <br>

        Gia nhap:
        <input type="number" name="importPrice" class="form-control">
        <br>

        So luong:
        <input type="number" name="quantity" class="form-control">
        <br>

        Loai:
        <input type="number" name="type" class="form-control">
        <br>
        Mo ta:
        <input type="text" name="description" class="form-control">
        <br>
        Anh gioi thieu:
        <input type="text" name="intro_img" class="form-control">
        <br>
        Phan loai san pham:
        <br>
        <button class="btn btn-success">Thêm mới sản phẩm</button>


    </form>

@endsection
