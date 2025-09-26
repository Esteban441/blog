@extends('layouts.index')
@section('title', 'Mi Perfil')
@section('css')
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-profile">
            <div class="card-header" style="background-image: url('assets/img/blogpost.jpg')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="{{empty(auth()->user()->foto) ? asset('/perfil.jpg') : url('/storage/' . auth()->user()->foto)}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name">{{auth()->user()->name}}</div>
                    <div class="job">{{auth()->user()->email}}</div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row user-stats text-center">
                    <div class="col">
                        <div class="number">{{auth()->user()->posts->count()}}</div>
                        <div class="title">Posts</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Actualizar Informacion
                </h4>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <form class="row" action="{{url('/actualizar/perfil')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label>Nombre completo</label>
                            <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{auth()->user()->email}}">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Contraseña</label>
                            <input type="text" class="form-control" name="password">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="foto">
                            @error('foto')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary">Actualizar informacion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection