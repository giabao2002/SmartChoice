<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ThuongHieu;
use App\Models\KhuyenMai;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ThayDoiTaiKhoanController extends Controller
{
    public function index()
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanphams = SanPham::all();
        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        return view('index')->with('route', 'tai-khoan')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
        ;
    }

    public function update(Request $request)
    {
        // Validate thông tin
        $request->validate([
            'ten_nguoi_dung' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'sdt' => 'required|string|max:12',
            'ten_dang_nhap' => 'required|string|max:255',
        ], [
            'ten_nguoi_dung.required' => 'Vui lòng nhập họ và tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'sdt.required' => 'Vui lòng nhập số điện thoại',
            'ten_dang_nhap.required' => 'Vui lòng nhập tên đăng nhập',
        ]);

        $data = User::find($request->id);
        
        // Kiểm tra email đã tồn tại cho người dùng khác
        $emailExists = User::where('email', $request->email)
                          ->where('id', '!=', $request->id)
                          ->exists();
        if ($emailExists) {
            return back()->withErrors(['email' => 'Email đã được sử dụng bởi tài khoản khác']);
        }
        
        // Kiểm tra tên đăng nhập đã tồn tại cho người dùng khác
        $usernameExists = User::where('ten_dang_nhap', $request->ten_dang_nhap)
                             ->where('id', '!=', $request->id)
                             ->exists();
        if ($usernameExists) {
            return back()->withErrors(['ten_dang_nhap' => 'Tên đăng nhập đã được sử dụng bởi tài khoản khác']);
        }
        
        // Kiểm tra số điện thoại đã tồn tại cho người dùng khác
        $phoneExists = User::where('sdt', $request->sdt)
                          ->where('id', '!=', $request->id)
                          ->exists();
        if ($phoneExists) {
            return back()->withErrors(['sdt' => 'Số điện thoại đã được sử dụng bởi tài khoản khác']);
        }

        $data['ten_nguoi_dung'] = $request->ten_nguoi_dung;
        $data['email'] = $request->email;
        $data['sdt'] = $request->sdt;
        $data['ten_dang_nhap'] = $request->ten_dang_nhap;
        
        // Chỉ cập nhật mật khẩu nếu người dùng nhập mật khẩu mới
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $data->save();
        return redirect('/tai-khoan')->with('success', 'Cập nhật thông tin thành công!');
    }
}
