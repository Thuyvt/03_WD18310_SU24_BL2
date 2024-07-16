@extends('layouts.master')

@section('title')
    Danh sách sách
@endsection

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Nhà xuất bản</th>
                <th>Tác giả</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->public_company}}</td>
                    <td>{{$item->author->name}}</td>
                    <td>{{$item->image}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>
                        {!! $item->is_active ? '<span class="badge bg-success">Hoạt động</span>'
                        : '<span class="badge bg-danger">Không hoạt động</span>'!!}
                    </td>
                    <td>
                        <a href="{{route('books.show', $item)}}" class="btn btn-info">Xem</a>
                        <a href="{{route('books.edit', $item)}}" class="btn btn-success">Sửa</a>
                        <form action="{{route('books.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
