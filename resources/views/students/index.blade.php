@extends('layout.main')

@section('title', 'Students')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-5">Daftar Students!</h1>
                
                <a href="{{url('/students/create')}}" class="btn btn-sm btn-primary my-3">Tambah Data</a>

                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('message')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif

                <ul class="list-group">
                    @foreach($students as $s)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$s->nama}}
                        <a href="{{url('/students/'.$s->id)}}" class="badge badge-primary">Detail</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection