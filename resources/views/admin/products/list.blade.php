@extends('admin.main')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-head-fixed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hình Ảnh</th>
                        <th>Danh Mục</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>
                                @if($p->thumb != '')
                                    <img src="{{$p->thumb}}" alt="hình ảnh {{$p->name}}" style="width:100px"/>
                                @endif
                            </td>
                            <td>{{$p->menu_id}}</td>
                            <td>{!! ($p->active == 1) ? '<span class="btn btn-success btn-xs">yes</span>' : '<span class="btn btn-danger btn-xs">no</span>' !!}</span></td>
                            <td><a href="/admin/products/edit/{{$p->id}}" class="text-primary"><i class="fas fa-edit"></i></a>
                                <a href="#" rel="{{$p->id}}" class="text-danger removeProduct"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">{!! $products->links() !!}</td>
                    </tr>
                </tfoot>
            </table>


        </div>
    </div>
@endsection
