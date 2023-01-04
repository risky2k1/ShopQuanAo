@extends('admin.master')

@section('content')
<style>
    .buttoms{
        display: flex;
    }
    .buttoms > form{
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
                        <a href="{{route('quan-tri.product.create')}}" class="form-control btn btn-primary"
                           style="color:black;background: #E91E63;">Thêm</a>
                        <div class="card-content">
                            <h4 class="card-title">Simple Table</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Ảnh</th>
                                        <th>Name</th>
                                        <th>Danh muc</th>
                                        <th>Nhan hang</th>
                                        <th class="text-right">Gia ban</th>
                                        <th class="text-right">Gia nhap</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                    @foreach ($product as $key=>$pro)
                                       
                                        <tr> 
                                            <form></form>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td><img src="{{$pro->intro_img}}" alt=""
                                                     style="height: 100px;width: 100px"></td>
                                            <td>{{$pro->name}}</td>
                                            <td>{{$pro->categoryname}}</td>
                                            <td>{{$pro->brandname}}</td>
                                            <td >{{$pro->sellPrice}}</td>
                                            <td >{{$pro->importPrice}}</td>
                                            <td class="buttoms">
                                                <a href="{{route('quan-tri.product.edit',$pro)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </a>
                                              
                                                <form action="{{route('quan-tri.product.destroy',$pro)}}" method="post" class="">
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
