<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

class UploadService
{
    public function store($request)
    {
        try {
            if ($request->hasFile('file')) {
                $name = $request->file('file')->getClientOriginalName();
                
                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file('file')->storeAs('public/' . $pathFull, $name);
                return asset('storage/' . $pathFull . '/' . $name);
            } else {
                Session::flash('error', 'Không có tệp được chọn');
                return false;
            }
        } catch (\Exception $error) {
            Session::flash('error', 'Đã xảy ra lỗi khi tải lên ảnh');
            return false;
        }
    }
}
