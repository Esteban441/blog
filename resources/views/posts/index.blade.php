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
<div class="row justify-content-center">
    @foreach($posts as $post)
    <div class="col-7">
        <div class="card card-post card-round">
            @if(!empty($post->foto))
            <img class="card-img-top" src="{{asset('/storage/' . $post->foto)}}" alt="Card image cap">
            @endif
            <div class="card-body">
                <div class="d-flex">
                    <div class="avatar">
                        <img src="{{empty($post->user->foto) ? asset('/perfil.jpg') : asset('/storage/' . $post->user->foto)}}" alt="Foto del usuario" class="avatar-img rounded-circle">
                    </div>
                    <div class="info-post ms-2">
                        <p class="username">{{$post->user->name}}</p>
                        <p class="date text-muted">{{$post->created_at}}</p>
                    </div>
                </div>
                <div class="separator-solid"></div>
                <h3 class="card-title">
                    <a href="#"> {{$post->titulo}} </a>
                </h3>
                <p class="card-text">
                    {{$post->contenido}}
                </p>
                <a href="#" class="btn btn-primary btn-rounded btn-sm">Ver mas</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('js')
@endsection