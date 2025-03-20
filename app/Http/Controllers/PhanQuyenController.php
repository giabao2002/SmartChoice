<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhanQuyen;

class PhanQuyenController extends Controller
{
    public function store(Request $request)
    {
        $phanquyen = PhanQuyen::create([
            'ten_phan_quyen' => $request->input('ten_phan_quyen'),
        ]);
        return Redirect('/admin/phanquyen');
    }

    public function show($id)
    {
        $data = PhanQuyen::all();
        return View('admin.phanquyen.phanquyen', ['phanquyens' => $data]);
    }

    public function edit($id)
    {
        $data = PhanQuyen::find($id);
        return View('admin.phanquyen.sua', ['phanquyen' => $data]);
    }

    public function update(Request $request)
    {
        $phanquyen = PhanQuyen::find($request->id_phan_quyen);
        $phanquyen->ten_phan_quyen = $request->ten_phan_quyen;

        $phanquyen->save();
        return Redirect('/admin/phanquyen');
    }

    public function destroy($id)
    {
        $data = PhanQuyen::find($id);
        $data->delete();
        return Redirect('/admin/phanquyen');
    }
}
