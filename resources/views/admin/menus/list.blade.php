@extends('admin.main')

@section('content')
<table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
    aria-describedby="example2_info">
    <thead>
        <tr role="row">
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Desc</th>
            <th>Content</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $m)
            <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->name}}</td>
                <td>{{$m->parent_id}}</td>
                <td>{{$m->description}}</td>
                <td>{{$m->content}}</td>
                <td>{{$m->active}}</td>
                <td>
                    <a href="/admin/menus/edit/{{$m->id}}" class="text-secondary"><span class="material-icons">mode_edit</span></a>
                    <a href="#" rel="{{$m->id}}" class="text-danger removeMenu"><span class="material-icons">delete</span></a>
                </td>
            </tr>
            @foreach ($m->childrenMenus as $childMenu)
                @include('admin.menus.child_table', ['child_menu' => $childMenu, 'currentParent' => 0, 'prefix' => '----'])
            @endforeach

        @endforeach
    </tbody>
</table>
@endsection
