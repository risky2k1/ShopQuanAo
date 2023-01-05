@extends('admin.layout.master')
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
    <form action="{{route('quan-tri.category.store')}}" class="form-group" method="post">
        @csrf
        Tên danh mục:
        <input type="text" name="name" class="form-control">
        <div class="btn-group bootstrap-select">

            <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7"
                    tabindex="-98" name="parent_id">
                <option class="bs-title-option" value="">Single Select</option>
                <option disabled="" selected="">Chọn danh mục</option>
                @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endforeach
            </select>
        </div>

        <br>
        <button class="btn btn-success">Thêm mới danh mục</button>


    </form>

@endsection
