@extends('layout.main')

@section('title', 'Students')

@section('container')
    <div class="container mb-5">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-5 mb-4">From Students!</h1>

                <form method="POST" action="{{url('/students')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <label >Nama</label>
                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" value="{{old('nama')}}">
                    @error('nama') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>NIP</label>
                    <input name="npm" type="text" class="form-control @error('npm') is-invalid @enderror" placeholder="Masukkan NIP" value="{{old('npm')}}">
                    @error('npm') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{old('email')}}">
                    @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>Jurusan</label>
                    <input name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Masukkan Jurusan" value="{{old('jurusan')}}">
                    @error('jurusan') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>Gambar</label>
                    <input name="image" type="file" class="form-control-file @error('image') is-invalid @enderror" value="{{old('image')}}">
                    @error('image') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <button class="btn btn-primary mt-3">Simpan</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection