<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    //
    public function index() {
        echo 'Trang danh sách sản phẩm';
        // Lấy dữ liệu từ csdl -> đổ lên view
        // $listsp = DB::table('sanpham')->get();
        $listsp = DB::table('sanpham')->join('danhmuc', 'sanpham.iddm', '=', 'danhmuc.id')
        ->select('sanpham.*','danhmuc.name as name_dm')->get();
        // echo '<pre>';
        // print_r($listsp);
        $top3 = DB::table('sanpham')->orderBy('luotxem', 'desc')->limit(3)->get();

        return view('sanpham.list', compact('listsp', 'top3'));
    }
    public function detail($idsp) {
        echo 'Chi tiết sản phẩm ' . $idsp;
        $data = DB::table('sanpham')->where('id', '=', $idsp)->first();
        if (!$data) { 
            echo 'Không tồn tại bản ghi';
        } else {
            // print_r($data);
            return view('sanpham.detail', compact('data'));
        }
    }
    public function delete($id) {
        echo 'Sản phẩm muốn xóa ' .$id;
        $sql = DB::table('sanpham')->where('id', '=',$id)->delete();
        return redirect()->route('san-pham.index');
    }
}
