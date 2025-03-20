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
        $data = ThuongHieu::find($id);
        $data->delete();
        return Redirect('/admin/thuonghieu');
    }
}
