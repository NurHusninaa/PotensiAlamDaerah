@extends('layouts.profil.app')

@section('contentBody')
<div class="container-fluid d-flex align-items-center justify-content-center" style=" background-color: #EEEFAD">
    <div class="row d-flex justify-content-around">
        @forelse ($profilMahasiswa as $profil)
            <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                <div class="card my-4">
                    <img src="{{ asset('storage/' . $profil->foto_profil) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{ $profil->deskripsi }}.</p>
                        <a href="{{ route('profil.show', $profil->nim) }}" class="btn" style="background-color: #BCBC38;">Profil Saya</a>
                    </div>
                </div>
            </div>
        @empty
            <h2 class="text-white my-4">Data Profil Kosong</h2>
        @endforelse
    </div>
</div>
@endsection