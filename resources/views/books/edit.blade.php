@extends('layouts.master')

@section('title')
    Cập nhật sách
@endsection

@section('content')
    <form action="{{route('books.update', $book)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-3 mb-3">
            <label class="form-label">Tác giả</label>
            <select name="author_id" id="" class="form-select">
                @foreach($authors as $id => $name)
                    <option value="{{$id}}" @selected($id == $book->author_id)>{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="{{$book->name}}">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Nhà xuất bản</label>
            <input type="text" class="form-control" name="public_company" value="{{$book->public_company}}">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image">
            @if(!empty($book->image))
                <div style="width: 100px;height: 100px;">
                    <img src="{{Storage::url($book->image)}}"
                         style="max-width: 100%; max-height: 100%;" alt="">
                </div>
            @endif
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Số lượng</label>
            <input type="text" class="form-control" name="quantity" value="{{$book->quantity}}">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-check-label">Trạng thái</label>
            <input type="checkbox" class="form-check-input" @checked($book->is_active) name="is_active">
        </div>
        <button class="btn btn-success">Cập nhật</button>
    </form>
@endsection
