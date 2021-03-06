@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sửa Danh Mục: {{ $menu->name }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menuName">Tên Danh Mục</label>
                <input type="text" name="name" class="form-control" value="{{ $menu->name }}" id="menuName" placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label for="menuParent">Danh Mục Cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0">-- Chọn Menu -- </option>
                    @foreach ($menus as $m)
                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                        @foreach ($m->childrenMenus as $childMenu)
                            @include('admin.menus.child_select', ['child_menu' => $childMenu, 'currentParent' => $menu->parent_id, 'prefix' => '----'])
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="menuDesc">Mô tả</label>
                <textarea class="form-control" name="description" rows="3" id="menuDesc" placeholder="Nhập mô tả ...">{{ $menu->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="menuContent">Nội dung</label>
                <textarea class="form-control" name="content" rows="3" id="menuContent" placeholder="Nhập nội dung ...">{{ $menu->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menuLink">Link</label>
                <input type="text" name="link" class="form-control" id="menuLink" value="{{ $menu->link }}" placeholder="Nhập đường dẫn">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="active" {{ ($menu->active == 1) ? "checked" : "" }} id="menuActive">
                <label class="form-check-label" for="menuActive">Kích Hoạt</label>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>

        @csrf
    </form>
</div>
@endsection

@section('foot')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'menuContent' );
    </script>
@endsection
