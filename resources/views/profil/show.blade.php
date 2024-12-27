@extends('layouts.profil.app')

@section('title')
Profil {{ $profil->nama  }}
@endsection

@section('headerContent')
<header class="header">
    <div class="container">
        <div class="header-content" style="color: #727204">
            <h4 class="header-subtitle">Halo, Saya</h4>
            <h1 class="header-title" style="color: #F2F2E1">{{ $profil->nama }}</h1>
            <h6 class="header-mono" >{{ $profil->kelas }}</h6>
        </div>
    </div>
</header>
@endsection

@section('imageNav')
<ul class="navbar-nav brand">
    <img src="{{ asset('storage/'. $profil->foto_profil) }}" alt="{{ $profil->nim }}" class="brand-img">
    <li class="brand-txt">
        <h5 class="brand-title">{{ $profil->nama }}</h5>
        <div class="brand-subtitle">{{ $profil->email }}</div>
    </li>
</ul>
@endsection

@section('contentBody')
<div class="container-fluid">
    <div id="about" class="row about-section">
        <div class="col-lg-4 about-card text-white" style="background-color: #727204">
            <h3 class="font-weight-light">Saya berasal dari </h3>
            <span class="mb-3">{{ $profil->alamat }}</span>
            <h5 class="mt-4 mb-2">{{ $profil->kelas }}</h5>
            <p class="mt-20 text-white">{{ $profil->deskripsi }}</p>
        </div>
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">Info Personal</h3>
            <span class="line mb-5"></span>
            <ul class="mt40 info list-unstyled">
                <li><span>Email</span> : {{ $profil->email }}</li>
                <li><span>Kelas</span> : {{ $profil->kelas }}</li>
                <li><span>Alamat</span> :  {{ $profil->alamat }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection