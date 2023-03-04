@extends('admin.layout.master')

@section('content')
    <style>
        .buttons {
            display: flex;
        }

        .buttons > form {
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
                        <div class="card-content">
                            <h4 class="card-title">Simple Table</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Tên Người dùng</th>
                                        <th>Email</th>
                                        <th>Quyền</th>

                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user as $key=>$u)
                                        <tr>
                                            <form></form>
                                            <td class="text-center">
                                                {{$key+1}}
                                            </td>
                                            <td>
                                                {{$u->name}}
                                            </td>
                                            <td>
                                                {{$u->email}}
                                            </td>
                                            <td>
                                                {{$u->role_name}}
                                            </td>

                                            <td class="buttons">
                                                {{--                                                {{route('quan-tri.category.edit',$cate)}}--}}
                                                <a href="">
                                                    <button type="button" rel="tooltip" class="btn btn-success"
                                                            data-original-title="" title="">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </a>
                                                {{--                                                {{route('quan-tri.category.destroy',$cate)}}--}}
                                                <form action="" method="post" class="">
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
