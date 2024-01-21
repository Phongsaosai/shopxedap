@extends('admin.main')
@section('header')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="POST">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Tên danh mục</label>
            <input type="text" name="menu" class="form-control" id="menu" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label >Danh mục</label>
            <seclect class="form-control" name="parent_id">
                <option value="0">Danh mục cha</option>
            </seclect>
        </div>

        <div class="form-group">
            <label >Mô tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label >Mô tả chi tiết</label>
            <textarea name="content" id="content" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="form-check">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="form-check">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>
</form>
@endsection
@section('footer')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection