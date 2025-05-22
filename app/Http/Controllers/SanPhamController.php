<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ThuongHieu;
use App\Models\KhuyenMai;

class SanPhamController extends Controller
{
    public function create()
    {
        $loaisanphams = LoaiSanPham::all();
        $thuonghieus = ThuongHieu::all();
        $khuyenmais = KhuyenMai::all();

        return View('admin.sanpham.them')
            ->with('loaisanphams', $loaisanphams)
            ->with('thuonghieus', $thuonghieus)
            ->with('khuyenmais', $khuyenmais)
        ;
    }

    public function store(Request $request)
    {
        try {
            $hinh1 = "";
            $hinh2 = "";
            $hinh3 = "";
            $hinh4 = "";

            if ($request->file('hinh_anh_1')) {
                try {
                    $filename1 = $request->file('hinh_anh_1');
                    $hinh1 = $filename1->getClientOriginalName();
                    $filename1->move(public_path('product-img'), $hinh1);
                } catch (\Exception $e) {
                    Log::error('Error uploading hinh_anh_1: ' . $e->getMessage());
                    return back()->with('error', 'Error uploading image 1: ' . $e->getMessage());
                }
            }
            if ($request->file('hinh_anh_2')) {
                try {
                    $filename2 = $request->file('hinh_anh_2');
                    $hinh2 = $filename2->getClientOriginalName();
                    $filename2->move(public_path('product-img'), $hinh2);
                } catch (\Exception $e) {
                    Log::error('Error uploading hinh_anh_2: ' . $e->getMessage());
                    $hinh2 = $hinh1;
                }
            } else {
                $hinh2 = $hinh1;
            }
            if ($request->file('hinh_anh_3')) {
                try {
                    $filename3 = $request->file('hinh_anh_3');
                    $hinh3 = $filename3->getClientOriginalName();
                    $filename3->move(public_path('product-img'), $hinh3);
                } catch (\Exception $e) {
                    Log::error('Error uploading hinh_anh_3: ' . $e->getMessage());
                    $hinh3 = $hinh1;
                }
            } else {
                $hinh3 = $hinh1;
            }
            if ($request->file('hinh_anh_4')) {
                try {
                    $filename4 = $request->file('hinh_anh_4');
                    $hinh4 = $filename4->getClientOriginalName();
                    $filename4->move(public_path('product-img'), $hinh4);
                } catch (\Exception $e) {
                    Log::error('Error uploading hinh_anh_4: ' . $e->getMessage());
                    $hinh4 = $hinh1;
                }
            } else {
                $hinh4 = $hinh1;
            }

            Log::info('About to create product with data: ', [
                'ten_san_pham' => $request->input('ten_san_pham'),
                'ten_loai_san_pham' => $request->input('ten_loai_san_pham'),
                'ten_thuong_hieu' => $request->input('ten_thuong_hieu'),
                'mo_ta' => $request->input('mo_ta'),
                'don_gia' => $request->input('don_gia'),
                'so_luong' => $request->input('so_luong'),
                'hinh_anh_1' => $hinh1,
                'hinh_anh_2' => $hinh2,
                'hinh_anh_3' => $hinh3,
                'hinh_anh_4' => $hinh4,
                'ten_khuyen_mai' => $request->input('ten_khuyen_mai'),
            ]);

            $sanpham = SanPham::create([
                'ten_san_pham' => $request->input('ten_san_pham'),
                'ten_loai_san_pham' => $request->input('ten_loai_san_pham'),
                'ten_thuong_hieu' => $request->input('ten_thuong_hieu'),
                'mo_ta' => $request->input('mo_ta'),
                'don_gia' => $request->input('don_gia'),
                'so_luong' => $request->input('so_luong'),
                'hinh_anh_1' => $hinh1,
                'hinh_anh_2' => $hinh2,
                'hinh_anh_3' => $hinh3,
                'hinh_anh_4' => $hinh4,
                'ten_khuyen_mai' => $request->input('ten_khuyen_mai'),
                'so_luong_mua' => '0',
            ]);

            Log::info('Product created successfully with ID: ' . $sanpham->id_san_pham);
            return Redirect('/admin/sanpham')->with('success', 'Product added successfully');
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return back()->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $data = SanPham::all();
        return View('admin.sanpham.sanpham', ['sanphams' => $data]);
    }

    public function edit($id)
    {
        $data = SanPham::find($id);
        $loaisanphams = LoaiSanPham::all();
        $thuonghieus = ThuongHieu::all();
        $khuyenmais = KhuyenMai::all();

        return View('admin.sanpham.sua', ['sanpham' => $data])
            ->with('loaisanphams', $loaisanphams)
            ->with('thuonghieus', $thuonghieus)
            ->with('khuyenmais', $khuyenmais)
        ;
    }

    public function update(Request $request)
    {
        $sanpham = SanPham::find($request->id_san_pham);

        if ($request->file('hinh_anh_1')) {
            $filename1 = $request->file('hinh_anh_1');
            $hinh1 = $filename1->getClientOriginalName();
            $filename1->move(public_path('product-img'), $hinh1);
            $sanpham['hinh_anh_1'] = $hinh1;
        }

        if ($request->file('hinh_anh_2')) {
            $filename2 = $request->file('hinh_anh_2');
            $hinh2 = $filename2->getClientOriginalName();
            $filename2->move(public_path('product-img'), $hinh2);
            $sanpham['hinh_anh_2'] = $hinh2;
        }

        if ($request->file('hinh_anh_3')) {
            $filename3 = $request->file('hinh_anh_3');
            $hinh3 = $filename3->getClientOriginalName();
            $filename3->move(public_path('product-img'), $hinh3);
            $sanpham['hinh_anh_3'] = $hinh3;
        }

        if ($request->file('hinh_anh_4')) {
            $filename4 = $request->file('hinh_anh_4');
            $hinh4 = $filename4->getClientOriginalName();
            $filename4->move(public_path('product-img'), $hinh4);
            $sanpham['hinh_anh_4'] = $hinh4;
        }

        $sanpham['ten_san_pham'] = $request->ten_san_pham;
        $sanpham['ten_loai_san_pham'] = $request->ten_loai_san_pham;
        $sanpham['ten_thuong_hieu'] = $request->ten_thuong_hieu;
        $sanpham['mo_ta'] = $request->mo_ta;
        $sanpham['don_gia'] = $request->don_gia;
        $sanpham['so_luong'] = $request->so_luong;
        $sanpham['ten_khuyen_mai'] = $request->ten_khuyen_mai;

        $sanpham->save();
        return Redirect('/admin/sanpham');
    }

    public function destroy($id)
    {
        // Kiểm tra sản phẩm có trong đơn hàng nào không
        $donhangs = \App\Models\DonHang::all();
        
        foreach ($donhangs as $donhang) {
            // Đơn hàng lưu trữ dưới dạng serialize nên cần unserialize
            $hoadon_items = unserialize($donhang['hoa_don']);
            
            // Nếu hoa_don không phải array hoặc trống, bỏ qua
            if (!is_array($hoadon_items) || empty($hoadon_items)) {
                continue;
            }
            
            // Kiểm tra xem sản phẩm có trong đơn hàng này không
            if (array_key_exists($id, $hoadon_items)) {
                // Sản phẩm tồn tại trong đơn hàng, không cho phép xóa
                return redirect('/admin/sanpham')
                    ->with('error', 'Không thể xóa sản phẩm này vì nó đã có trong đơn hàng.');
            }
        }
        
        // Nếu không có đơn hàng nào chứa sản phẩm này, tiến hành xóa
        $data = SanPham::find($id);
        $data->delete();
        return redirect('/admin/sanpham')->with('success', 'Đã xóa sản phẩm thành công.');
    }
}
