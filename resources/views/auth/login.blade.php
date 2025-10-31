@extends('layouts.auth')
@section('title', 'Login')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="text-center">
            Login
        </h4>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form class="row" action="{{route('login')}}" method="POST">
                @csrf
                <div class="col-12 mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ej: example@gmail.com">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label>Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <a href="{{url('/register')}}" class="btn btn-secondary">Registrarse</a>
                    <button class="btn btn-primary">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection