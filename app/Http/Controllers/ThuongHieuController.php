<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThuongHieu;

class ThuongHieuController extends Controller
{
    public function store(Request $request)
    {
        $thuonghieu = ThuongHieu::create([
            'ten_thuong_hieu' => $request->input('ten_thuong_hieu'),
        ]);
        return Redirect('/admin/thuonghieu');
    }

    public function show($id)
    {
        $data = ThuongHieu::all();
        return View('admin.thuonghieu.thuonghieu', ['thuonghieus' => $data]);
    }

    public function edit($id)
    {
        $data = ThuongHieu::find($id);
        return View('admin.thuonghieu.sua', ['thuonghieu' => $data]);
    }

    public function update(Request $request)
    {
        $thuonghieu = ThuongHieu::find($request->id_thuong_hieu);
        $thuonghieu['ten_thuong_hieu'] = $request->ten_thuong_hieu;

        $thuonghieu->save();
        return Redirect('/admin/thuonghieu');
    }

    public function destroy($id)
    {
        // Lấy thông tin thương hiệu
        $thuonghieu = ThuongHieu::find($id);
        
        // Kiểm tra xem có sản phẩm nào thuộc thương hiệu này không
        $sanphams = \App\Models\SanPham::where('ten_thuong_hieu', $thuonghieu->ten_thuong_hieu)->get();
        
        if ($sanphams->count() > 0) {
            // Thương hiệu đang chứa sản phẩm, không cho phép xóa
            return redirect('/admin/thuonghieu/thuonghieu')
                ->with('error', 'Không thể xóa thương hiệu này vì nó đang chứa sản phẩm.');
        }
        
        // Nếu không có sản phẩm nào, tiến hành xóa
        $thuonghieu->delete();
        return redirect('/admin/thuonghieu/thuonghieu')
            ->with('success', 'Đã xóa thương hiệu thành công.');
    }
}
