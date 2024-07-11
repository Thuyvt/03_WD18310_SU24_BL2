@extends('layouts.master')

@section('title')
    Tạo mới nhạc sĩ
@endsection

@section('content')
    <form action="{{route('nhacsi.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="ten1">
        </div>
        <div class="row">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="row">
            <label for="" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name="ngaysinh">
        </div>
        <div class="row">
            <label for="" class="form-label">Quê quán</label>
            <input type="text" class="form-control" name="quequan">
        </div>
        <button type="submit" class="btn btn-success mt-2 mb-2">Tạo mới</button>
    </form>
@endsection
