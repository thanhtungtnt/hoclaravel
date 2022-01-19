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
        {!! App\Helpers\Helper::menus($menus, 0, '') !!}
    </tbody>
</table>
@endsection
