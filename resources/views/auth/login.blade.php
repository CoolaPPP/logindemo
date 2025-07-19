@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h3>เข้าสู่ระบบ</h3>
            </div>
            <div class="card-body">
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
                </form>
                <p class="mb-2 mt-2 me-5 text-center">
                    ยังไม่มีบัญชี? <a href="{{ route('register') }}" class="text-danger">ลงทะเบียน</a>
                    <a href="{{ route('welcome') }}" class="btn btn-secondary">กลับไปยังหน้าหลัก</a>
                </p>
            </div>
            
        </div>
    </div>
</div>
@endsection