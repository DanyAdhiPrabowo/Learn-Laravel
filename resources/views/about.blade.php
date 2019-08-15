@extends('layout.main')

@section('title', 'About')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-5">Hello, About!</h1>
                <h2>{{$name}}</h2>
            </div>
        </div>
    </div>
@endsection