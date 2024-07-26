@extends('layouts.app')

@section('content')
    <div class="mt-16 container">
        <h2>Đăng nhập</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf
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
            <button class="btn btn-primary" type="submit">Đăng nhập</button>
        </form>
    </div>
@endsection
