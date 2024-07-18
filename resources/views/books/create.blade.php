@extends('layouts.master')

@section('title')
    Tạo mới sách
@endsection

@section('content')
    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-3 mb-3">
            <label class="form-label">Tác giả</label>
            <select name="author_id" id="" class="form-select">
                @foreach($authors as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Nhà xuất bản</label>
            <input type="text" class="form-control" name="public_company">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Số lượng</label>
            <input type="text" class="form-control" name="quantity">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-check-label">Trạng thái</label>
            <input type="checkbox" class="form-check-input" name="is_active">
        </div>
        <button class="btn btn-success">Tạo mới</button>
    </form>
@endsection
