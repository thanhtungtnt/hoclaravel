<tr>
    <td>{{$childMenu->id}}</td>
    <td>{{$prefix.$childMenu->name}}</td>
    <td>{{$childMenu->parent_id}}</td>
    <td>{{$childMenu->description}}</td>
    <td>{{$childMenu->content}}</td>
    <td>{{$childMenu->active}}</td>
    <td>
        <a href="/admin/menus/edit/{{$childMenu->id}}" class="text-secondary"><span class="material-icons">mode_edit</span></a>
        <a href="#" rel="{{$childMenu->id}}" class="text-danger removeMenu"><span class="material-icons">delete</span></a>
    </td>
</tr>
@if ($childMenu->menus)
    @foreach ($childMenu->menus as $childMenu)
        @include('admin.menus.child_table', ['child_menu' => $childMenu, 'currentParent' => 0, 'prefix' => $prefix.'----'])
    @endforeach
@endif
