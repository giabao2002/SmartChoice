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
        $data = KhuyenMai::find($id);
        $data->delete();
        return Redirect('/admin/khuyenmai');
    }
}
