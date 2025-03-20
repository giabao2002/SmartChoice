<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ThuongHieu;
use App\Models\KhuyenMai;
use App\Models\GioHang;
use App\Models\PhanQuyen;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanphams = SanPham::all();
        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        $giohangs = session()->get('gio_hang');
        if (!$giohangs) {
            $giohangs = array();
        }

        return view('index')->with('route', 'gio-hang')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('giohangs', $giohangs)
        ;
    }

    public function themvaogiohang($id)
    {
        $sanpham = SanPham::find($id);
        $gio_hang = session()->get('gio_hang');
        $khuyenmais = KhuyenMai::all();

        if (isset($gio_hang[$id])) {
            $gio_hang[$id]['so_luong'] += 1;
        } else {
            $gio_hang[$id] = [
                'hinh_anh_1' => $sanpham['hinh_anh_1'],
                'ten_san_pham' => $sanpham['ten_san_pham'],
                'don_gia' => $sanpham['don_gia'],
                'so_luong' => '1',
            ];

            foreach ($khuyenmais as $khuyenmai) {
                if ($khuyenmai['ten_khuyen_mai'] == $sanpham['ten_khuyen_mai']) {
                    $gio_hang[$id]['khuyen_mai'] = $khuyenmai['gia_tri_khuyen_mai'];
                }
            }
        }
        session()->put('gio_hang', $gio_hang);
        return Redirect('/cua-hang/san-pham=' . $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $sanpham = SanPham::find($request->id);
        $gio_hang = session()->get('gio_hang');
        $gio_hang[$request->id]['so_luong'] =  $request->so_luong;
        session()->put('gio_hang', $gio_hang);
        return Redirect('/gio-hang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gio_hang = session()->get('gio_hang');
        unset($gio_hang[$id]);
        session()->put('gio_hang', $gio_hang);
        return Redirect('/gio-hang');
    }

    public function lichsu(Request $request, $id = null)
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanphams = SanPham::all();
        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        if ($id != null) {
            $donhang = DonHang::find($id);

            return view('index')->with('route', 'lich-su')
                ->with('data', $data)
                ->with('thuonghieus', $thuonghieus)
                ->with('loaisanphams', $loaisanphams)
                ->with('sanphams', $sanphams)
                ->with('users', $users)
                ->with('phanquyens', $phanquyens)
                ->with('khuyenmais', $khuyenmais)
                ->with('donhang', $donhang)
            ;
        }

        $donhangs = DonHang::where('id_user', session('DangNhap'))->get();
        return view('index')->with('route', 'lich-su')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('donhangs', $donhangs)
        ;
    }
}
