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
        // Lấy thông tin phân quyền
        $phanquyen = PhanQuyen::find($id);
        
        // Kiểm tra xem có tài khoản nào đang sử dụng phân quyền này không
        $users = \App\Models\User::where('id_phan_quyen', $id)->get();
        
        if ($users->count() > 0) {
            // Phân quyền đang được sử dụng bởi tài khoản, không cho phép xóa
            return redirect('/admin/phanquyen')
                ->with('error', 'Không thể xóa phân quyền này vì đang được áp dụng cho tài khoản.');
        }
        
        // Nếu không có tài khoản nào sử dụng phân quyền này, tiến hành xóa
        $phanquyen->delete();
        return redirect('/admin/phanquyen')
            ->with('success', 'Đã xóa phân quyền thành công.');
    }
}
