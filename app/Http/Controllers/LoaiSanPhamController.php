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
        $data = LoaiSanPham::find($id);
        $data->delete();
        return Redirect('/admin/loaisanpham');
    }
}
