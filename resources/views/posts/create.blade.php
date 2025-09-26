@extends('layouts.index')
@section('title', 'Listado de publicaciones')
@section('css')
@endsection
@section('content')
<div class="page-header">
    <h3 class="fw-bold mb-3">Posts</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="#">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-home">
            <a href="{{url('/post/create')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar post">
                <i class="icon-plus p-0 m-0"></i>
            </a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Publicar post
                </h4>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <form class="row" action="{{url('/post/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label>Titulo</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{old('titulo')}}">
                            @error('titulo')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            @error('foto')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label>Contenido</label>
                            <textarea class="form-control @error('contenido') is-invalid @enderror" name="contenido">{{old('contenido')}}</textarea>
                            @error('contenido')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary">Publicar</button>
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