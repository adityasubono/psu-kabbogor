@extends('layouts/main')

@section('title', 'Daftar Students')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-5">
            <h1 class="mt-3">Daftar Students</h1>
            <a href="/students/create" class="btn btn-primary my-3">Add Student</a>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            @foreach( $students as $student )
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $student->nama }}
                    <a href="/students/{{ $student->id }}" class="badge badge-info">Detail</a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
