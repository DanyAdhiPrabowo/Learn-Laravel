@extends('layout.main')

@section('title', 'Mahasiswa')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-5">Daftar Mahasiswa!</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $mahasiswa as $m )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->npm }}</td>
                                <td>{{ $m->email }}</td>
                                <td>{{ $m->jurusan }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-small">Edit</a>
                                    <a href="#" class="btn btn-danger btn-small">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
@endsection