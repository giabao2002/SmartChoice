<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ThuongHieuController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\ThayDoiTaiKhoanController;
use App\Http\Controllers\DanhGiaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MomoController;

//Đăng nhập/Đăng ký
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/auth/save', [MainController::class, 'storeReg'])->name('registerStore');
Route::get('/auth/logoff', [MainController::class, 'dangXuat'])->name('auth.logoff');

// Trang chủ
Route::get('/', [MainController::class, 'index']);
Route::get('/trang-chu', [MainController::class, 'index']);

// Tìm kiếm
Route::post('/tim-kiem', [MainController::class, 'timkiem']);

// Cửa hàng/Chi tiết sản phẩm
Route::get('/cua-hang', [MainController::class, 'cuahang']);
Route::get('/cua-hang/loaisanpham={loaisanpham}', [MainController::class, 'timloaisanpham']);
Route::get('/cua-hang/thuonghieu={thuonghieu}', [MainController::class, 'timthuonghieu']);
Route::get('/cua-hang/gia={gia1}-{gia2}', [MainController::class, 'timgia']);
Route::get('/cua-hang/san-pham={slug}', [MainController::class, 'sanpham']);

// Giới thiệu
Route::get('/gioi-thieu', [MainController::class, 'aboutUs']);

//Thanh toán
Route::get('/thanh-toan', [DonHangController::class, 'index']);
Route::post('/thanh-toan', [DonHangController::class, 'thanhtoan']);
Route::post('/thanh-toan/hoadon', [DonHangController::class, 'store']);
Route::post('/thanh-toan/get-qr', [MomoController::class, 'store'])->name('get-qr');

// Giỏ hàng
Route::get('/gio-hang', [GioHangController::class, 'index']);
Route::post('/gio-hang/cap-nhat', [GioHangController::class, 'update']);
Route::get('/gio-hang/xoa/id={id}', [GioHangController::class, 'destroy']);
Route::get('/cua-hang/san-pham={id}/them', [GioHangController::class, 'themvaogiohang'])->name('them-vao-gio-hang');

// Lịch sử đặt hàng
Route::get('/lich-su/{id?}', [GioHangController::class, 'lichsu']);

// Đánh giá
Route::post('/cua-hang/san-pham={id}/danh-gia', [DanhGiaController::class, 'store']);

//Thay đổi tài khoản
Route::get('/tai-khoan', [ThayDoiTaiKhoanController::class, 'index']);
Route::post('/tai-khoan/sua', [ThayDoiTaiKhoanController::class, 'update']);

//---------------------------------------------------------------------------------------------------------------------------//
// Quản trị viên
Route::post('/', [MainController::class, 'loginCheck'])->name('app.dashboard');
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/{slug}', [AdminController::class, 'dieuhuong']);
Route::get('/admin/{slug}/{slug2}', [AdminController::class, 'dieuhuong2']);

// Tài khoản
Route::get('/admin/taikhoan/taikhoan', [MainController::class, 'show']);
Route::get('/admin/taikhoan/them', [MainController::class, 'create']);
Route::post('/admin/taikhoan/them', [MainController::class, 'store']);
Route::get('/admin/taikhoan/xoa/id={id}', [MainController::class, 'destroy']);
Route::get('/admin/taikhoan/sua/id={id}', [MainController::class, 'edit']);
Route::post('/admin/taikhoan/sua', [MainController::class, 'update']);

// Thương hiệu
Route::get('/admin/thuonghieu/thuonghieu', [ThuongHieuController::class, 'show']);
Route::post('/admin/thuonghieu/them', [ThuongHieuController::class, 'store']);
Route::get('/admin/thuonghieu/xoa/id={id}', [ThuongHieuController::class, 'destroy']);
Route::get('/admin/thuonghieu/sua/id={id}', [ThuongHieuController::class, 'edit']);
Route::post('/admin/thuonghieu/sua', [ThuongHieuController::class, 'update']);

// Loại sản phẩm
Route::get('/admin/loaisanpham/loaisanpham', [LoaiSanPhamController::class, 'show']);
Route::post('/admin/loaisanpham/them', [LoaiSanPhamController::class, 'store']);
Route::get('/admin/loaisanpham/xoa/id={id}', [LoaiSanPhamController::class, 'destroy']);
Route::get('/admin/loaisanpham/sua/id={id}', [LoaiSanPhamController::class, 'edit']);
Route::post('/admin/loaisanpham/sua', [LoaiSanPhamController::class, 'update']);

// Sản phẩm
Route::get('/admin/sanpham/sanpham', [SanPhamController::class, 'show']);
Route::get('/admin/sanpham/them', [SanPhamController::class, 'create']);
Route::post('/admin/sanpham/them', [SanPhamController::class, 'store']);
Route::get('/admin/sanpham/xoa/id={id}', [SanPhamController::class, 'destroy']);
Route::get('/admin/sanpham/sua/id={id}', [SanPhamController::class, 'edit']);
Route::post('/admin/sanpham/sua', [SanPhamController::class, 'update']);

// Khuyến mãi
Route::get('/admin/khuyenmai/khuyenmai', [KhuyenMaiController::class, 'show']);
Route::post('/admin/khuyenmai/them', [KhuyenMaiController::class, 'store']);
Route::get('/admin/khuyenmai/xoa/id={id}', [KhuyenMaiController::class, 'destroy']);
Route::get('/admin/khuyenmai/sua/id={id}', [KhuyenMaiController::class, 'edit']);
Route::post('/admin/khuyenmai/sua', [KhuyenMaiController::class, 'update']);

// Phân quyền
Route::get('/admin/phanquyen/phanquyen', [PhanQuyenController::class, 'show']);
Route::post('/admin/phanquyen/them', [PhanQuyenController::class, 'store']);
Route::get('/admin/phanquyen/xoa/id={id}', [PhanQuyenController::class, 'destroy']);
Route::get('/admin/phanquyen/sua/id={id}', [PhanQuyenController::class, 'edit']);
Route::post('/admin/phanquyen/sua', [PhanQuyenController::class, 'update']);

// Hóa đơn
Route::get('/admin/donhang/xoa/id={id}', [DonHangController::class, 'destroy']);
Route::get('/admin/donhang/xem/id={id}', [DonHangController::class, 'show']);
Route::get('/admin/donhang/duyet/id={id}', [DonHangController::class, 'update']);
Route::get('/admin/donhang/hoanthanh/id={id}', [DonHangController::class, 'edit']);
