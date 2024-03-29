@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="productName">Tên Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" id="productName" placeholder="Nhập tên sản phẩm" value="{{ old('name')}}">
                </div>

                <div class="form-group">
                    <label for="productDesc">Mô tả</label>
                    <textarea class="form-control" name="description" rows="3" id="productDesc" placeholder="Nhập mô tả ...">{{ old('description')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="productContent">Nội dung</label>
                    <textarea class="form-control" name="content" rows="3" id="productContent" placeholder="Nhập nội dung ...">{{ old('content')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="productMenu">Danh Mục</label>
                    <select class="form-control" name="menu_id" id="productMenu">
                        <option value="0">-- Chọn Danh Mục -- </option>
                        @foreach ($menus as $m)
                            <option value="{{ $m->id }}">{{ $m->name }}</option>
                            @foreach ($m->childrenMenus as $childMenu)
                                @include('admin.menus.child_select', ['child_menu' => $childMenu, 'currentParent' => 0, 'prefix' => '----'])
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="productPrice">Giá</label>
                            <input type="text" class="form-control" name="price" id="productPrice" placeholder="Nhập giá" value="{{ old('price')}}" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="productPriceSale">Giá Sale</label>
                            <input type="text" class="form-control" name="price_sale" id="productPriceSale" placeholder="Nhập giá sale (nếu có)" value="{{ old('price_sale')}}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="productImage">Ảnh sản phẩm</label>
                    <input type="file" name="thumb" class="form-control" id="productImage" />
                    <input type="hidden" name="product_thumb" id="productThumb" value="">
                    <div class="imgWrap" style="display: none; max-width: 200px">
                        <img src="" class="img-thumbnail rounded d-block" alt="">
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="active" checked="checked" id="productActive" value="{{ old('active')}}>
                    <label class="form-check-label" for="productActive">Kích Hoạt</label>
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
        CKEDITOR.replace( 'productContent' );
    </script>
@endsection
