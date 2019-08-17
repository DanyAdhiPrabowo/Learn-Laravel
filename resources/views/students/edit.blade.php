@extends('layout.main')

@section('title', 'Students')

@section('container')
    <div class="container mb-5">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-5 mb-4">From Edit Students!</h1>

                <form method="POST" action="{{url('students/'.$student->id)}}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                  <div class="form-group">
                    <label >Nama</label>
                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" value="{{$student->nama}}">
                    @error('nama') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>NIP</label>
                    <input name="npm" type="text" class="form-control @error('npm') is-invalid @enderror" placeholder="Masukkan NIP" value="{{$student->npm}}">
                    @error('npm') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{$student->email}}">
                    @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>Jurusan</label>
                    <input name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Masukkan Jurusan" value="{{$student->jurusan}}">
                    @error('jurusan') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group mb-5">
                    <label>Gambar</label>
                    <div class="mt-2 mb-3">
                      <img src="{{asset('image/upload_students/'.$student->image)}}" width="200" height="200">  
                    </div>
                    <input name="image" type="file" class="form-control-file @error('image') is-invalid @enderror" value="{{asset('image/upload_students/'.$student->image)}}">
                    @error('image') <div class="invalid-feedback">{{$message}}</div>@enderror
                  </div> 
                  <button class="btn btn-primary ">Update</button>
                  <a href="{{url('/students')}}" class="btn bg-secondary text-white">Back</a>
                </form>
                
            </div>
        </div>
    </div>
@endsection