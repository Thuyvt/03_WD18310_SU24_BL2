<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NhacsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('nhacsis')->get();
        return view('nhacsi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('nhacsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        xử lý ảnh
        if ($request->hasFile('image')) {
            $url = Storage::put('nhacsi', $request->file('image'));
        } else {
            $url = '';
        }
        DB::table('nhacsis')->insert([
            'ten' => $request->ten1,
            'anh'=> $url,
            'ngaysinh' => $request->ngaysinh,
            'quequan'=> $request->quequan,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('nhacsi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = DB::table('nhacsis')->where('id', $id)->first();
        $listAmNhac = DB::table('amnhacs')->where('id_nhacsi', $id)
            ->join('nhacsis', 'amnhacs.id_nhacsi', '=', 'nhacsis.id')
            ->select('amnhacs.*', 'nhacsis.ten as ten_nhacsi')
            ->get();
        return view('nhacsi.show', compact('model', 'listAmNhac'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = DB::table('nhacsis')->where('id', $id)->first();
        return view('nhacsi.edit', compact('model'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->hasFile('image')) {
            $url = Storage::put('nhacsi', $request->file('image'));
        } else {
            $url = '';
        }
        DB::table('nhacsis')->where('id', $id)
            ->update([
            'ten' => $request->ten1,
            'anh'=> $url,
            'ngaysinh' => $request->ngaysinh,
            'quequan'=> $request->quequan,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('nhacsi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('nhacsis')->where('id', $id)->delete();
        return back();
    }
}
