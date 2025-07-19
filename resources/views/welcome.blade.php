@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <h2>MD 5 Login Demo</h2>
            </div>
            <div class="card-body text-center">
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-success">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection