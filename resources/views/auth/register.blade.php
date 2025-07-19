@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>ลงทะเบียนผู้ใช้</h3>
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

                <form action="{{ route('register') }}" method="POST" id="registerForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">ระบุรหัสผ่านอีกครั้ง</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">ยืนยัน</button>
                </form>
                <p class="mb-2 mt-2 me-5 text-center ">
                    มีบัญชีผู้ใช้แล้ว? <a href="{{ route('login') }}" class="text-danger">เข้าสู่ระบบ</a>
                    <a href="{{ route('welcome') }}" class="btn btn-secondary">กลับไปยังหน้าหลัก</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const registerForm = document.getElementById('registerForm');
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');

    registerForm.addEventListener('submit', function(e) {
        if (password.value !== passwordConfirmation.value) {
            e.preventDefault();
            alert('รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบรหัสผ่านใหม่อีกครั้ง.');
            password.focus();
        }
    });
</script>
@endsection