<?php

namespace App\Http\Controllers;

use App\Modules\Momo\Services\MomoService;
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
use App\Models\DonHang;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('check') == 0) {
            return view('auth.login');
        } else {
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

            return view('index')->with('route', 'thanh-toan')
                ->with('data', $data)
                ->with('thuonghieus', $thuonghieus)
                ->with('loaisanphams', $loaisanphams)
                ->with('sanphams', $sanphams)
                ->with('users', $users)
                ->with('phanquyens', $phanquyens)
                ->with('khuyenmais', $khuyenmais)
                ->with('giohangs', $giohangs)
                ->with('qrCode', session()->get('qrCode'))
            ;
        }
    }

    public function thanhtoan(Request $request)
    {
        $giohangs = session()->get('gio_hang');
        if (!$giohangs) {
            $giohangs = array();
        }

        $thanhtoans = array();

        $check_gio_hangs = $request->input('check-gio-hang');
        foreach ($check_gio_hangs as $check_gio_hang) {
            foreach ($giohangs as $id => $giohang) {
                if ($check_gio_hang == $id) {
                    $thanhtoans[$id] = $giohang;
                }
            }
        }

        if (session()->get('check') == 0) {
            return view('auth.login');
        } else {
            $data = User::where('id', session('DangNhap'))->first();
            $thuonghieus = ThuongHieu::all();
            $loaisanphams = LoaiSanPham::all();
            $sanphams = SanPham::all();
            $users = User::all();
            $phanquyens = PhanQuyen::all();
            $khuyenmais = KhuyenMai::all();

            return view('index')->with('route', 'thanh-toan')
                ->with('data', $data)
                ->with('thuonghieus', $thuonghieus)
                ->with('loaisanphams', $loaisanphams)
                ->with('sanphams', $sanphams)
                ->with('users', $users)
                ->with('phanquyens', $phanquyens)
                ->with('khuyenmais', $khuyenmais)
                ->with('giohangs', $thanhtoans)
            ;
        }
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $giohangs = session()->get('gio_hang');
        $amount = 0;
        foreach ($giohangs as $giohang) {
            $amount += $giohang['so_luong'] * $giohang['don_gia'] - $giohang['so_luong'] * $giohang['don_gia'] * $giohang['khuyen_mai'] * 0.01;

        }
        $hinh_thuc_thanh_toan = $request->input('hinh_thuc_thanh_toan');
        $tong_tien = $request->input('tong_tien');

        $props = [];
        if ($hinh_thuc_thanh_toan === 'Thanh toán qua MoMo') {
            if (empty(session()->get('orderId')) || empty(session()->get('requestId'))) {
                return Redirect('/thanh-toan')->with('error', __('Chưa tạo QR code'));
            }

            $orderId = session()->get('orderId');
            $requestId = session()->get('requestId');

            $momoService = new MomoService(
                0,
                $orderId,
                $requestId,
                ''
            );

            $response = $momoService->confirm();
            if (empty($response)) {
                return Redirect('/thanh-toan')->with('error', __('Có lỗi xảy ra'));
            }

            if ($response['resultCode'] != 0) {
                return Redirect('/thanh-toan')->with('error', $response['message']);
            }

            if ($response['resultCode'] == 0 && intval($response['amount']) !== intval($amount)) {
                return Redirect('/thanh-toan')->with('error', __('Số tiền không khớp'));
            }

            // xoa session
            session()->forget('orderId');
            session()->forget('requestId');
            session()->forget('qrCode');

            $props = [
                'orderId' => $orderId,
                'requestId' => $requestId,
                'amount' => $amount,
            ];
        }

        $donhang = DonHang::create([
            'id_user' => session('DangNhap'),
            'ten_nguoi_nhan' => $request->input('ten_nguoi_nhan'),
            'sdt' => $request->input('sdt'),
            'dia_chi_nhan' => $request->input('dia_chi_nhan'),
            'ghi_chu' => $request->input('ghi_chu'),
            'tong_tien' => $tong_tien,
            'hoa_don' => $request->input('thanh_toans'),
            'hinh_thuc_thanh_toan' => $hinh_thuc_thanh_toan,
            'props' => json_encode($props),
        ]);

        $danh_gias = session()->get('danh_gias');
        if (!$danh_gias) {
            $danh_gias = array();
        }
        $oks = unserialize($request->input('thanh_toans'));
        foreach ($oks as $id => $ok) {
            $danh_gias[$id] = $ok;
            $sanpham = SanPham::find($id);
            $sanpham['so_luong_mua'] = $sanpham['so_luong_mua'] + 1;
            $sanpham->save();
        }
        session()->put('danh_gias', $danh_gias);

        foreach ($danh_gias as $iddg => $danh_gia) {
            foreach ($giohangs as $idgh => $giohang) {
                if ($idgh == $iddg) {
                    unset($giohangs[$idgh]);
                }
            }
        }
        session()->put('gio_hang', $giohangs);
        return Redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanphams = SanPham::all();
        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();
        $donhang = DonHang::find($id);

        $id_don_hang = $id;
        $trang_thai = $donhang['trang_thai'];
        $giohangs = session()->get('gio_hang');

        return view('admin.donhang.xem')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('donhang', $donhang)
            ->with('id_don_hang', $id_don_hang)
            ->with('trang_thai', $trang_thai)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DonHang::find($id);
        $data->trang_thai = 'Đã hoàn thành';
        $data->save();
        return Redirect('/admin/donhang');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = DonHang::find($id);
        $data->trang_thai = 'Đã xác nhận';
        $data->save();
        return Redirect('/admin/donhang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DonHang::find($id);
        $data->trang_thai = 'Đã hủy';
        $data->save();
        return Redirect('/admin/donhang');
    }
}
