@extends('admin.layout.master')

@section('content')
    <style>
        .buttons{
            display: flex;
        }
        .buttons > form{
            margin-right: 5px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <form action="" class="form-group">
                        <a href="{{route('quan-tri.category.create')}}" class="form-control btn btn-primary" style="color:black;background: #E91E63;">
                            Thêm mới danh mục
                        </a>
                        <div class="card-content">
                            <h4 class="card-title">Simple Table</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
{{--                                        <th>Ảnh</th>--}}
                                        <th>Tên Danh mục</th>
                                        <th>Danh mục cha</th>
                                        <th >Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($category as $key=>$cate)

                                        <tr>
                                            <form></form>
                                            <td class="text-center">{{$key+1}}</td>

                                            <td>{{$cate->name}}</td>
                                            <td>{{$cate->parent_id ? $cate->parent->name : 'Danh mục cha'}}</td>

                                            <td class="buttons">

                                                <a href="{{route('quan-tri.category.edit',$cate)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </a>

                                                <form action="{{route('quan-tri.category.destroy',$cate)}}" method="post" class="">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
