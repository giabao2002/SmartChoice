<?php

namespace App\Http\Controllers;

use App\Modules\Momo\Services\MomoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MomoController extends Controller
{
    public function store(Request $request)
    {
        if (session()->get('check') == 0) {
            return response()->json(['error' => 'Bạn chưa đăng nhập'], 401);
        }

        $giohangs = session()->get('gio_hang');
        if (!$giohangs) {
            return response()->json(['error' => 'Giỏ hàng trống'], 400);
        }

        $amount = 0;
        foreach ($giohangs as $giohang) {
            $amount += $giohang['so_luong'] * $giohang['don_gia'] - $giohang['so_luong'] * $giohang['don_gia'] * $giohang['khuyen_mai'] * 0.01;

        }

        $orderId = 'DH_'.time().'_'.session('DangNhap');
        $requestId = md5(time() . session('DangNhap'));

        $momoService = new MomoService(
            $amount,
            $orderId,
            $requestId,
            ''
        );

        $response = $momoService->payment();
        if (empty($response)) {
            return response()->json(['error' => 'Có lỗi xảy ra'], 400);
        }

        if ($response['resultCode'] != 0) {
            return response()->json(['error' => $response['message']], 400);
        }

        $qrCode = $momoService->qrCode($response);
        $qrCode = base64_encode($qrCode);

        session()->put('orderId', $orderId);
        session()->put('requestId', $requestId);
        session()->put('qrCode', $qrCode);

        return response()->json(['qrCode' => $qrCode]);
    }
}
