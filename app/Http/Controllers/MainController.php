<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ThuongHieu;
use App\Models\KhuyenMai;
use App\Models\PhanQuyen;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function index()
    {

        if (session()->get('gio_hang') == null) {
            $gio_hang = array();
            session()->put('gio_hang', $gio_hang);
        }

        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanphams = SanPham::all();
        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        $sanphammoinhats = DB::table('san_pham')->orderBy('updated_at', 'desc')->get();
        $sanphamnoibats = DB::table('san_pham')->orderBy('so_luong_mua', 'desc')->get();

        return view('index')->with('route', 'trang-chu')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('sanphammoinhats', $sanphammoinhats)
            ->with('sanphamnoibats', $sanphamnoibats)
        ;
    }

    public function cuahang()
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanphams = SanPham::paginate(12);
        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        return view('index')->with('route', 'cua-hang')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('timloaisanpham', '')->with('timthuonghieu', '')
        ;
    }

    public function thanhtoan()
    {
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
        ;
    }

    public function timkiem(Request $request)
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanphams = DB::table('san_pham')->where('ten_san_pham', 'like', '%' . $request->tim_kiem . '%')
            ->orWhere('ten_loai_san_pham', 'like', '%' . $request->tim_kiem . '%')
            ->orWhere('ten_thuong_hieu', 'like', '%' . $request->tim_kiem . '%')
            ->orWhere('don_gia', 'like', '%' . $request->tim_kiem . '%')
            ->paginate(12);

        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        return view('index')->with('route', 'cua-hang')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('timloaisanpham', '')->with('timthuonghieu', '')
        ;
    }

    public function sanpham($slug)
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanpham = SanPham::find($slug);

        if (DB::table('san_pham')->where('ten_thuong_hieu', $sanpham['ten_thuong_hieu'])->orWhere('ten_loai_san_pham', $sanpham['ten_loai_san_pham'])->count() < 4) {
            $sanphamtuongtus = DB::table('san_pham')
                ->where('ten_thuong_hieu', $sanpham['ten_thuong_hieu'])
                ->orWhere('don_gia', '>', $sanpham['don_gia'] - 100000)->where('don_gia', '<', $sanpham['don_gia'] + 100000)
                ->orWhere('ten_loai_san_pham', $sanpham['ten_loai_san_pham'])->get();
        } else if (DB::table('san_pham')->where('ten_thuong_hieu', $sanpham['ten_thuong_hieu'])->count() < 4) {
            $sanphamtuongtus = DB::table('san_pham')->where('ten_thuong_hieu', $sanpham['ten_thuong_hieu'])->orWhere('ten_loai_san_pham', $sanpham['ten_loai_san_pham'])->get();
        } else {
            $sanphamtuongtus = DB::table('san_pham')->where('ten_thuong_hieu', $sanpham['ten_thuong_hieu'])->get();
        }

        $danhgias = DB::table('danh_gia')->where('id_san_pham', $sanpham['id_san_pham'])->paginate(3);

        $danh_gias = session()->get('danh_gias');
        if (!$danh_gias) {
            $danh_gias = array();
        }

        $soluongdanhgia = array();
        $soluongdanhgia['count_danh_gia'] = DB::table('danh_gia')->where('id_san_pham', $sanpham['id_san_pham'])->count();
        $soluongdanhgia['danh_gia'] = DB::table('danh_gia')->where('id_san_pham', $sanpham['id_san_pham'])->avg('danh_gia');

        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        $gio_hangs = session()->get('gio_hang');
        if (!$gio_hangs) {
            $gio_hangs = array();
        }

        return view('index')->with('route', 'san-pham')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanpham', $sanpham)
            ->with('sanphamtuongtus', $sanphamtuongtus)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('danh_gias', $danh_gias)
            ->with('danhgias', $danhgias)
            ->with('soluongdanhgia', $soluongdanhgia)
            ->with('gio_hangs', $gio_hangs)
        ;
    }

    public function timloaisanpham($loaisanpham)
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        $sanphams = DB::table('san_pham')->where('ten_loai_san_pham', $loaisanpham)->paginate(9);

        return view('index')->with('route', 'cua-hang')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('timloaisanpham', $loaisanpham)
            ->with('timthuonghieu', '')
        ;
    }

    public function timthuonghieu($thuonghieu)
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();
        $sanphams = DB::table('san_pham')->where('ten_thuong_hieu', $thuonghieu)->paginate(9);
        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        return view('index')->with('route', 'cua-hang')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('timthuonghieu', $thuonghieu)
            ->with('timloaisanpham', '')
        ;
    }

    public function timgia($gia1, $gia2)
    {
        $data = User::where('id', session('DangNhap'))->first();
        $thuonghieus = ThuongHieu::all();
        $loaisanphams = LoaiSanPham::all();

        if ($gia1 == '0') {
            $sanphams = DB::table('san_pham')->where('don_gia', '<', $gia2)->paginate(9);
        } else {
            $sanphams = DB::table('san_pham')->where('don_gia', '>', $gia1)->where('don_gia', '<', $gia2)->paginate(9);
        }

        $users = User::all();
        $phanquyens = PhanQuyen::all();
        $khuyenmais = KhuyenMai::all();

        return view('index')->with('route', 'cua-hang')
            ->with('data', $data)
            ->with('thuonghieus', $thuonghieus)
            ->with('loaisanphams', $loaisanphams)
            ->with('sanphams', $sanphams)
            ->with('users', $users)
            ->with('phanquyens', $phanquyens)
            ->with('khuyenmais', $khuyenmais)
            ->with('timthuonghieu', '')
            ->with('timloaisanpham', '')
        ;
    }

    public function aboutUs()
    {
        return view('index')->with('route', 'gioi-thieu');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    // HandleRegister
    public function storeReg(Request $request)
    {
        User::create([
            'ten_nguoi_dung' => $request->input('ten_nguoi_dung'),
            'email' => $request->input('email'),
            'sdt' => $request->input('sdt'),
            'ten_dang_nhap' => $request->input('ten_dang_nhap'),
            'password' => Hash::make($request->input('password')),
            'id_phan_quyen' => '2',
        ]);

        return redirect()->route('auth.login');
    }

    // HandleLogin
    public function loginCheck(Request $request)
    {
        $request->validate([
            'ten_dang_nhap' => 'required',
            'password' => 'required | min:5',
        ]);

        $userinfoEmail = User::where('email', $request->ten_dang_nhap)->first();
        $userinfoUser = User::where('ten_dang_nhap', $request->ten_dang_nhap)->first();

        if (!$userinfoEmail) {
            if (!$userinfoUser) {
                return back()->with('thatbai', '* Tên đăng nhập hoặc Email không tồn tại!');
            } else {
                if (Hash::check($request->password, $userinfoUser->password)) {
                    $request->session()->put('DangNhap', $userinfoUser->id);

                    $data = User::where('id', session('DangNhap'))->first();
                    $thuonghieus = ThuongHieu::all();
                    $loaisanphams = LoaiSanPham::all();
                    $sanphams = SanPham::all();
                    $users = User::all();
                    $khuyenmais = KhuyenMai::all();
                    $donhangs = DonHang::all();
                    $sanphammoinhats = DB::table('san_pham')->orderBy('created_at', 'desc')->get();
                    $sanphamnoibats = DB::table('san_pham')->orderBy('so_luong_mua', 'desc')->get();

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

                    if ($userinfoUser->id_phan_quyen == '1') {
                        session()->put('check', '1');
                        return view('admin.trangchu.trangchu')
                            ->with('data', $data)
                            ->with('thuonghieus', $thuonghieus)
                            ->with('loaisanphams', $loaisanphams)
                            ->with('sanphams', $sanphams)
                            ->with('users', $users)
                            ->with('khuyenmais', $khuyenmais)
                            ->with('donhangs', $donhangs)
                            ->with('sanphammoinhats', $sanphammoinhats)
                            ->with('sanphamnoibats', $sanphamnoibats)
                            ->with('thongkethang', $thongkethang)
                            ->with('thongkenam', $thongkenam)
                        ;
                    } else {
                        session()->put('check', '2');
                        return view('index')->with('data', User::where('id', session('DangNhap'))->first())->with('route', 'trang-chu')
                            ->with('thuonghieus', $thuonghieus)
                            ->with('loaisanphams', $loaisanphams)
                            ->with('sanphams', $sanphams)
                            ->with('users', $users)
                            ->with('khuyenmais', $khuyenmais)
                            ->with('donhangs', $donhangs)
                            ->with('sanphammoinhats', $sanphammoinhats)
                            ->with('sanphamnoibats', $sanphamnoibats)
                        ;
                    }
                } else {
                    session()->put('check', '0');
                    return back()->with('thatbai', '* Mật khẩu nhập không đúng, vui lòng nhập lại');
                }
            }
        } else {
            if (Hash::check($request->password, $userinfoEmail->password)) {
                $request->session()->put('DangNhap', $userinfoEmail->id);

                $data = User::where('id', session('DangNhap'))->first();
                $thuonghieus = ThuongHieu::all();
                $loaisanphams = LoaiSanPham::all();
                $sanphams = SanPham::all();
                $users = User::all();
                $khuyenmais = KhuyenMai::all();
                $donhangs = DonHang::all();
                $sanphammoinhats = DB::table('san_pham')->orderBy('created_at', 'desc')->get();
                $sanphamnoibats = DB::table('san_pham')->orderBy('so_luong_mua', 'desc')->get();
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

                if ($userinfoEmail->id_phan_quyen == '1') {
                    session()->put('check', '1');
                    return view('admin.trangchu.trangchu')
                        ->with('data', $data)
                        ->with('thuonghieus', $thuonghieus)
                        ->with('loaisanphams', $loaisanphams)
                        ->with('sanphams', $sanphams)
                        ->with('users', $users)
                        ->with('khuyenmais', $khuyenmais)
                        ->with('donhangs', $donhangs)
                        ->with('sanphammoinhats', $sanphammoinhats)
                        ->with('sanphamnoibats', $sanphamnoibats)
                        ->with('thongkethang', $thongkethang)
                        ->with('thongkenam', $thongkenam)
                    ;
                } else {
                    session()->put('check', '2');
                    return view('index')->with('data', User::where('id', session('DangNhap'))->first())->with('route', 'trang-chu')
                        ->with('data', $data)
                        ->with('thuonghieus', $thuonghieus)
                        ->with('loaisanphams', $loaisanphams)
                        ->with('sanphams', $sanphams)
                        ->with('users', $users)
                        ->with('khuyenmais', $khuyenmais)
                        ->with('donhangs', $donhangs)
                        ->with('sanphammoinhats', $sanphammoinhats)
                        ->with('sanphamnoibats', $sanphamnoibats)
                    ;
                }
            } else {
                session()->put('check', '0');
                return back()->with('thatbai', '* Mật khẩu nhập không đúng, vui lòng nhập lại');
            }
        }
    }

    function dangXuat()
    {
        if (session()->has('DangNhap')) {
            session()->pull('DangNhap');
            session()->put('check', '0');
            return redirect('/');
        }
        session()->put('check', '0');
        return redirect('/');
    }

    public function create()
    {
        $phanquyens = PhanQuyen::all();
        return View('admin.taikhoan.them', ['phanquyens' => $phanquyens]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'ten_nguoi_dung' => $request->input('ten_nguoi_dung'),
            'email' => $request->input('email'),
            'sdt' => $request->input('sdt'),
            'ten_dang_nhap' => $request->input('ten_dang_nhap'),
            'password' => Hash::make($request->input('password')),
            'id_phan_quyen' => $request->input('id_phan_quyen')
        ]);
        return Redirect('/admin/taikhoan/taikhoan');
    }

    public function show($id)
    {
        $data = User::with('phanquyen')->get();
        return View('admin.taikhoan.taikhoan', ['users' => $data]);
    }

    public function edit($id)
    {
        $data = User::find($id);
        $phanquyens = PhanQuyen::all();
        return View('admin.taikhoan.sua', ['data' => $data, 'phanquyens' => $phanquyens]);
    }

    public function update(Request $request)
    {
        $data = User::find($request->id);
        $data['ten_nguoi_dung'] = $request->ten_nguoi_dung;
        $data['email'] = $request->email;
        $data['sdt'] = $request->sdt;
        $data['ten_dang_nhap'] = $request->ten_dang_nhap;
        $data['id_phan_quyen'] = $request->id_phan_quyen;

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $data->save();
        return Redirect('/admin/taikhoan');
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return Redirect('/admin/taikhoan');
    }
}
