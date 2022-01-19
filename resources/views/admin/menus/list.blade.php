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
        </tr>
    </thead>
    <tbody>
        {!! App\Helpers\Helper::menus($menus, 0, '') !!}
        {{-- <tr class="odd">
            <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
            <td>Firefox 1.0</td>
            <td>Win 98+ / OSX.2+</td>
            <td>1.7</td>
            <td>A</td>
        </tr>
        <tr class="even">
            <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
            <td>Firefox 1.5</td>
            <td>Win 98+ / OSX.2+</td>
            <td>1.8</td>
            <td>A</td>
        </tr>
        <tr class="odd">
            <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
            <td>Firefox 2.0</td>
            <td>Win 98+ / OSX.2+</td>
            <td>1.8</td>
            <td>A</td>
        </tr>
        <tr class="even">
            <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
            <td>Firefox 3.0</td>
            <td>Win 2k+ / OSX.3+</td>
            <td>1.9</td>
            <td>A</td>
        </tr>
        <tr class="odd">
            <td class="sorting_1 dtr-control">Gecko</td>
            <td>Camino 1.0</td>
            <td>OSX.2+</td>
            <td>1.8</td>
            <td>A</td>
        </tr>
        <tr class="even">
            <td class="sorting_1 dtr-control">Gecko</td>
            <td>Camino 1.5</td>
            <td>OSX.3+</td>
            <td>1.8</td>
            <td>A</td>
        </tr>
        <tr class="odd">
            <td class="sorting_1 dtr-control">Gecko</td>
            <td>Netscape 7.2</td>
            <td>Win 95+ / Mac OS 8.6-9.2</td>
            <td>1.7</td>
            <td>A</td>
        </tr>
        <tr class="even">
            <td class="sorting_1 dtr-control">Gecko</td>
            <td>Netscape Browser 8</td>
            <td>Win 98SE+</td>
            <td>1.7</td>
            <td>A</td>
        </tr>
        <tr class="odd">
            <td class="sorting_1 dtr-control">Gecko</td>
            <td>Netscape Navigator 9</td>
            <td>Win 98+ / OSX.2+</td>
            <td>1.8</td>
            <td>A</td>
        </tr>
        <tr class="even">
            <td class="sorting_1 dtr-control">Gecko</td>
            <td>Mozilla 1.0</td>
            <td>Win 95+ / OSX.1+</td>
            <td>1</td>
            <td>A</td>
        </tr>         --}}
    </tbody>
</table>
@endsection
