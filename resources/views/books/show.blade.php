
@extends('layouts.master')

@section('title')
    Chi tiết sách
@endsection

@section('content')
    <ul>
        <li>Tên: {{$book->name}}</li>
        <li>Nhà xuất bản: {{$book->public_company}}</li>
        <li>Ảnh:
            @if(!empty($book->image))
                <div style="width: 100px;height: 100px;">
                    <img src="{{Storage::url($book->image)}}"
                         style="max-width: 100%; max-height: 100%;" alt="">
                </div>
            @endif
        </li>
        <li>Tác giả: {{$book->author->name}}</li>
        <li>Số lượng: {{$book->quantity}}</li>
        <li>Trạng thái:
            <input type="checkbox" class="form-check-input" @checked($book->is_active)>
        </li>
    </ul>
@endsection
