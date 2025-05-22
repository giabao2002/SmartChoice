<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;

class KhuyenMaiController extends Controller
{
    public function store(Request $request)
    {
        $khuyenmai = KhuyenMai::create([
            'ten_khuyen_mai' => $request->input('ten_khuyen_mai'),
            'gia_tri_khuyen_mai' => $request->input('gia_tri_khuyen_mai'),
        ]);
        return Redirect('/admin/khuyenmai');
    }

    public function show($id)
    {
        $data = KhuyenMai::all();
        return View('admin.khuyenmai.khuyenmai', ['khuyenmais' => $data]);
    }

    public function edit($id)
    {
        $data = KhuyenMai::find($id);
        return View('admin.khuyenmai.sua', ['khuyenmai' => $data]);
    }

    public function update(Request $request)
    {
        $khuyenmai = KhuyenMai::find($request->id_khuyen_mai);
        $khuyenmai['ten_khuyen_mai'] = $request->ten_khuyen_mai;
        $khuyenmai['gia_tri_khuyen_mai'] = $request->gia_tri_khuyen_mai;
        $khuyenmai->save();
        return Redirect('/admin/khuyenmai');
    }

    public function destroy($id)
    {
        // Lấy thông tin khuyến mãi
        $khuyenmai = KhuyenMai::find($id);
        
        // Kiểm tra xem có sản phẩm nào đang sử dụng khuyến mãi này không
        $sanphams = \App\Models\SanPham::where('ten_khuyen_mai', $khuyenmai->ten_khuyen_mai)->get();
        
        if ($sanphams->count() > 0) {
            // Khuyến mãi đang được sử dụng cho sản phẩm, không cho phép xóa
            return redirect('/admin/khuyenmai')
                ->with('error', 'Không thể xóa khuyến mãi này vì đang được sử dụng bởi sản phẩm.');
        }
        
        // Nếu không có sản phẩm nào sử dụng khuyến mãi này, tiến hành xóa
        $khuyenmai->delete();
        return redirect('/admin/khuyenmai')
            ->with('success', 'Đã xóa khuyến mãi thành công.');
    }
}
