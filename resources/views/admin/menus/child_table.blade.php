<tr>
    <td>{{$childMenu->id}}</td>
    <td>{{$prefix.$childMenu->name}}</td>
    <td>{{$childMenu->parent_id}}</td>
    <td>{{$childMenu->description}}</td>
    <td>{{$childMenu->content}}</td>
    <td>
        @if($childMenu->active)
            <i class="fas fa-check">
        @else
            <i class="fas fa-times"></i>
        @endif
    </td>
    <td>
        <a href="/admin/menus/edit/{{$childMenu->id}}" class="text-primary"><i class="fas fa-edit"></i></a>
        <a href="#" rel="{{$childMenu->id}}" class="text-danger removeMenu"><i class="fas fa-trash"></i></a>
    </td>
</tr>
@if ($childMenu->menus)
    @foreach ($childMenu->menus as $childMenu)
        @include('admin.menus.child_table', ['child_menu' => $childMenu, 'currentParent' => 0, 'prefix' => $prefix.'----'])
    @endforeach
@endif
