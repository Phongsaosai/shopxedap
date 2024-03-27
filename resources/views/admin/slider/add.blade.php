@extends('admin.main')
@section('content')
<form action="" method="POST">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Tiêu đề</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="menu">Đường dẫn</label>
            <input type="text" name="url" value="{{ old('url') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="menu">Ảnh sản phẩm</label>
            <input type="file" class="form-control" id="upload">
            <div id="image_show">

            </div>
            <input type="hidden" name="thumb" id="thumb">
        </div>

        <div class="form-group">
            <label for="menu">Sắp xếp</label>
            <input type="number" name="sort_by" value="1" class="form-control">
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
        <button type="submit" class="btn btn-primary">Thêm slider</button>
    </div>
    @csrf
</form>
@endsection