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
                    <input type="text" name="name" class="form-control" id="productName" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="form-group">
                    <label for="productDesc">Mô tả</label>
                    <textarea class="form-control" name="description" rows="3" id="productDesc" placeholder="Nhập mô tả ..."></textarea>
                </div>

                <div class="form-group">
                    <label for="productContent">Nội dung</label>
                    <textarea class="form-control" name="content" rows="3" id="productContent" placeholder="Nhập nội dung ..."></textarea>
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
