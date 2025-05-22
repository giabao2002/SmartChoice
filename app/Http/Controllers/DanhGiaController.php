<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhGiaController extends Controller
{
    public function store($id, Request $request)
    {
        // Validation dữ liệu đầu vào
        $request->validate([
            'ten_danh_gia' => 'required|string|max:255',
            'danh_gia_binh_luan' => 'required|string',
            'danh_gia' => 'required|numeric|min:0|max:5',
        ], [
            'ten_danh_gia.required' => 'Vui lòng nhập tên người đánh giá',
            'danh_gia_binh_luan.required' => 'Vui lòng nhập nội dung đánh giá',
            'danh_gia.required' => 'Vui lòng chọn số sao đánh giá',
        ]);

        $check = 0;
        $dgs = DanhGia::all();
        foreach ($dgs as $dg) {
            if (($dg['id_user'] == $request->input('id_user')) && ($dg['id_san_pham'] == $request->input('id_san_pham'))) {
                $check = 1;
            } else {
                $check = 0;
            }
        }

        if ($check == 1) {
            $dg = DB::table('danh_gia')->where('id_san_pham', $request->input('id_san_pham'))->first();
            $danhgia = DanhGia::find($dg->id_danh_gia);
            $danhgia['danh_gia'] = $request->input('danh_gia');
            $danhgia['ten_danh_gia'] = $request->input('ten_danh_gia');
            $danhgia['danh_gia_binh_luan'] = $request->input('danh_gia_binh_luan');
            $danhgia->save();
            
            return redirect('/cua-hang/san-pham=' . $id)->with('success_rating', 'Cập nhật đánh giá thành công!');
        } else {
            DanhGia::create([
                'danh_gia' => $request->input('danh_gia'),
                'id_user' => $request->input('id_user'),
                'ten_danh_gia' => $request->input('ten_danh_gia'),
                'danh_gia_binh_luan' => $request->input('danh_gia_binh_luan'),
                'id_san_pham' => $id,
            ]);
            
            return redirect('/cua-hang/san-pham=' . $id)->with('success_rating', 'Đánh giá sản phẩm thành công!');
        }
    }
}
