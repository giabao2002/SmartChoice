<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    public function store(Request $request)
    {
        $loaisanpham = LoaiSanPham::create([
            'ten_loai_san_pham' => $request->input('ten_loai_san_pham'),
        ]);
        return Redirect('/admin/loaisanpham');
    }

    public function show($id)
    {
        $data = LoaiSanPham::all();
        return View('admin.loaisanpham.loaisanpham', ['loaisanphams' => $data]);
    }

    public function edit($id)
    {
        $data = LoaiSanPham::find($id);
        return View('admin.loaisanpham.sua', ['loaisanpham' => $data]);
    }

    public function update(Request $request)
    {
        $loaisanpham = LoaiSanPham::find($request->id_loai_san_pham);
        $loaisanpham['ten_loai_san_pham'] = $request->ten_loai_san_pham;

        $loaisanpham->save();
        return Redirect('/admin/loaisanpham');
    }

    public function destroy($id)
    {
        // Lấy thông tin loại sản phẩm
        $loaisanpham = LoaiSanPham::find($id);
        
        // Kiểm tra xem có sản phẩm nào thuộc loại sản phẩm này không
        $sanphams = \App\Models\SanPham::where('ten_loai_san_pham', $loaisanpham->ten_loai_san_pham)->get();
        
        if ($sanphams->count() > 0) {
            // Loại sản phẩm đang chứa sản phẩm, không cho phép xóa
            return redirect('/admin/loaisanpham/loaisanpham')
                ->with('error', 'Không thể xóa loại sản phẩm này vì nó đang chứa sản phẩm.');
        }
        
        // Nếu không có sản phẩm nào, tiến hành xóa
        $loaisanpham->delete();
        return redirect('/admin/loaisanpham/loaisanpham')
            ->with('success', 'Đã xóa loại sản phẩm thành công.');
    }
}
