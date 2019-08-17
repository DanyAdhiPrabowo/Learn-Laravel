@extends('layout.main')

@section('title', 'Students')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-5">Detail Students!</h1>
                <div class="card">
                  <div class="card-body">
                    <img src="{{asset('image/upload_students/'.$student->image)}}" width="200" height="200">
                    <h5 class="card-title">{{$student->nama}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$student->npm}}</h6>
                    <p class="card-text">{{$student->email}}</p>
                    <p class="card-text">{{$student->jurusan}}</p>

                    <a href="{{url('/students/'.$student->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>

                    <form method="POST" action="{{url('students/'.$student->id)}}" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <a href="{{url('/students')}}" class="btn btn-sm bg-secondary text-white">Back</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection