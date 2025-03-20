<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ThuongHieu;

class ThuongHieuController extends Controller
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
        $thuonghieu = ThuongHieu::create([
            'ten_thuong_hieu' => $request->input('ten_thuong_hieu'),
        ]);
        return Redirect('/admin/thuonghieu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ThuongHieu::all();
        return View('admin.thuonghieu.thuonghieu', ['thuonghieus' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ThuongHieu::find($id);
        return View('admin.thuonghieu.sua', ['thuonghieu' => $data]);
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
        $thuonghieu = ThuongHieu::find($request->id_thuong_hieu);
        $thuonghieu['ten_thuong_hieu'] = $request->ten_thuong_hieu;

        $thuonghieu->save();
        return Redirect('/admin/thuonghieu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ThuongHieu::find($id);
        $data->delete();
        return Redirect('/admin/thuonghieu');
    }
}
