@extends('layouts.auth')
@section('title', 'Registro')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="text-center p-3">
            Registro
        </h4>
    </div>
    <div class="card-body">
        <div class="containers">
            <form class="row" action="{{route('register')}}" method="POST">
                @csrf
                <div class="col-12 mb-3">
                    <label>Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ej: Juan Pablo">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
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
                <div class="col-12 mb-3">
                    <label>Confirmar Contraseña</label>
                    <input type="password" class="form-control @error('password_confimation') is-invalid @enderror" name="password_confirmation">
                    @error('password_confirmation')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection