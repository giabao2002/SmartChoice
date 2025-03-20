<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ThuongHieu;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $loaisanpham = LoaiSanPham::create([
            'ten_loai_san_pham' => $request->input('ten_loai_san_pham'),
        ]);
        return Redirect('/admin/loaisanpham');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = LoaiSanPham::all();
        return View('admin.loaisanpham.loaisanpham', ['loaisanphams' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LoaiSanPham::find($id);
        return View('admin.loaisanpham.sua', ['loaisanpham' => $data]);
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
        $loaisanpham = LoaiSanPham::find($request->id_loai_san_pham);
        $loaisanpham['ten_loai_san_pham'] = $request->ten_loai_san_pham;

        $loaisanpham->save();
        return Redirect('/admin/loaisanpham');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LoaiSanPham::find($id);
        $data->delete();
        return Redirect('/admin/loaisanpham');
    }
}
