<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ThuongHieu;
use App\Models\KhuyenMai;
use App\Models\PhanQuyen;
use App\Models\DonHang;


class AdminController extends Controller
{
    public function index()
    {
        if (session()->get('check') == 1) {
            $users = User::all();
            $sanphams = SanPham::all();
            $loaisanphams = LoaiSanPham::all();
            $thuonghieus = ThuongHieu::all();
            $khuyenmais = KhuyenMai::all();
            $phanquyens = PhanQuyen::all();
            $donhangs = DonHang::all();

            $thongkethang = DonHang::whereMonth('updated_at', date('m'))->whereYear('updated_at', date('Y'))->where('trang_thai', 'Đã hoàn thành')->get();
            $thongkenam = DonHang::whereYear('updated_at', date('Y'))->where('trang_thai', 'Đã hoàn thành')->get();

            $tongthang = 0;
            foreach ($thongkethang as $item) {
                $item->tong_tien = preg_replace('/[^0-9]/', '', $item->tong_tien);
                $tongthang += $item->tong_tien;
            }
            $tongnam = 0;
            foreach ($thongkenam as $item) {
                $item->tong_tien = preg_replace('/[^0-9]/', '', $item->tong_tien);
                $tongnam += $item->tong_tien;
            }
            $thongkethang = $tongthang;
            $thongkenam = $tongnam;

            return view('admin.trangchu.trangchu')
                ->with('data', User::where('id', session('DangNhap'))->first())
                ->with('route', 'TrangChu')
                ->with('users', $users)
                ->with('sanphams', $sanphams)
                ->with('loaisanphams', $loaisanphams)
                ->with('thuonghieus', $thuonghieus)
                ->with('khuyenmais', $khuyenmais)
                ->with('phanquyens', $phanquyens)
                ->with('donhangs', $donhangs)
                ->with('thongkethang', $thongkethang)
                ->with('thongkenam', $thongkenam)
            ;
        } else {
            return Redirect('/trang-chu');
        }
    }

    public function dieuhuong($slug)
    {
        if (session()->get('check') == 1) {
            $data = User::where('id', session('DangNhap'))->first();
            $thuonghieus = ThuongHieu::all();
            $loaisanphams = LoaiSanPham::all();
            $sanphams = SanPham::all();
            $users = User::all();
            $khuyenmais = KhuyenMai::all();
            $phanquyens = PhanQuyen::all();
            $donhangs = DonHang::all();

            return view("admin.{$slug}.{$slug}")
                ->with('data', $data)
                ->with('thuonghieus', $thuonghieus)
                ->with('loaisanphams', $loaisanphams)
                ->with('sanphams', $sanphams)
                ->with('users', $users)
                ->with('khuyenmais', $khuyenmais)
                ->with('phanquyens', $phanquyens)
                ->with('donhangs', $donhangs)
            ;
        } else {
            return Redirect('/trang-chu');
        }
    }

    public function dieuhuong2($slug, $slug2)
    {
        if (session()->get('check') == 1) {
            $data = User::where('id', session('DangNhap'))->first();
            $thuonghieus = ThuongHieu::all();
            $loaisanphams = LoaiSanPham::all();
            $sanphams = SanPham::all();
            $users = User::all();
            $phanquyens = PhanQuyen::all();
            $khuyenmais = KhuyenMai::all();
            $donhangs = DonHang::all();

            return view("admin.{$slug}.{$slug2}")
                ->with('data', $data)
                ->with('thuonghieus', $thuonghieus)
                ->with('loaisanphams', $loaisanphams)
                ->with('sanphams', $sanphams)
                ->with('users', $users)
                ->with('phanquyens', $phanquyens)
                ->with('khuyenmais', $khuyenmais)
                ->with('donhangs', $donhangs)
            ;
        } else {
            return Redirect('/trang-chu');
        }
    }
}
