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
    <form action="{{route('quan-tri.category.update',$category)}}" class="form-group" method="post">
        @csrf
        @method('put')
        Tên danh mục:
        <input type="text" name="name" class="form-control" value="{{$category->name}}">
        <div class="btn-group bootstrap-select">

            <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7" tabindex="-98" name="parent_id">
                <option class="bs-title-option" value="">Single Select</option>
                <option disabled="" selected="">Chọn danh mục</option>
                @foreach($data as $val)
                    <option {{$category->parent_id==$val->id?'selected':''}} value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button class="btn btn-success">Thêm mới danh mục</button>


    </form>

@endsection
