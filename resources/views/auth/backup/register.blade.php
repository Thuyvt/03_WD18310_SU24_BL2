@extends('layouts.backup.app')

@section('content')
    <div class="mt-16 container">
        <h2>Đăng ký</h2>
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" class="form-control" name="name">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nhập lại password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button class="btn btn-primary" type="submit">Đăng ký</button>
        </form>
    </div>
@endsection
