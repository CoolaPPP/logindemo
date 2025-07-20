@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Dashboard</h2>
            </div>
            <div class="card-body">
                @if(auth()->check())
                    <h4 class="mb-3">ยินดีต้อนรับ คุณ {{ $user->name }} {{ $user->surname }}!</h4>
                    <p><strong>Email ของคุณ :</strong> {{ $user->email }}</p>

                    <p><strong>รหัสนักศึกษา :</strong> {{ $user->student_id }}</p>

                    <p><strong>หมู่เรียน :</strong> {{ $user->section }}</p>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">ออกจากระบบ</button>
                    </form>
                @else
                    <p>กรุณา <a href="{{ route('login') }}">เข้าสู่ระบบ</a> เพื่อเข้าถึงหน้า dashboard.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection