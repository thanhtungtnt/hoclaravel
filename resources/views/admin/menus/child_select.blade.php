<option value="{{$child_menu->id}}" {{ ($currentParent == $child_menu->id) ? "selected" : "" }} >{{$prefix.$child_menu->name}}</option>
@if ($child_menu->menus)
    @foreach ($child_menu->menus as $childMenu)
        @include('admin.menus.child_select', ['currentParent' => $currentParent, 'child_menu' => $childMenu, 'prefix' => $prefix.'----'])
    @endforeach
@endif
