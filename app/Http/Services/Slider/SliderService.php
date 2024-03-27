<?php

namespace App\Http\Services\Slider;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Slider;

class SliderService
{
   public function insert($request){
    try{
        #$request->except('_token');
        Slider::create($request->input());
        Session::flash('success', 'Thêm slider thành công');

    }catch(\Exception $err){
        Session::flash('error', 'Thêm slider lỗi');
        Log::info($err->getMessage());

        return false;
    }
    return true;
   }

   public function get(){
    return Slider::orderByDesc('id')->paginate(7);
   }

   public function update($request, $slider){
    try{
        $slider->fill($request->input());
        $slider->save();
        Session::flash('success', 'Cập nhật slider thành công');
    }catch(\Exception $err){
        Session::flash('error', 'Cập nhật slider lỗi');
        Log::info($err->getMessage());
        return false;
    }
    return true;
   }

   public function delete($request){
    $slider = Slider::where('id', $request->input('id'))->first();
        if($slider){
            $slider->delete(); 
            return true;
        }
        return false;
   }

   public function show(){
    return Slider::where('active', 1)->orderByDesc('sort_by')->get();
   }
}