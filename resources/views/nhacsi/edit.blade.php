@extends('layouts.master')

@section('title')
    Cập nhật nhạc sĩ
@endsection

@section('content')
    <form action="{{route('nhacsi.update', $model->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="ten1" value="{{$model->ten}}">
        </div>
        <div class="row">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image">
            <img src="{{Storage::url($model->anh)}}" alt="" width="100" >
        </div>
        <div class="row">
            <label for="" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name="ngaysinh" value="{{$model->ngaysinh}}">
        </div>
        <div class="row">
            <label for="" class="form-label">Quê quán</label>
            <input type="text" class="form-control" name="quequan" value="{{$model->quequan}}">
        </div>
        <button type="submit" class="btn btn-success mt-2 mb-2">Cập nhật</button>
    </form>
@endsection
