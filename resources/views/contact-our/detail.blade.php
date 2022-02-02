@extends('admin')

@section('content')
<h1>Contact Our</h1><hr>
<div class="content">
    <div class="card-body">
        <p>Name : {{ $contactOur->name }}</p>
        <p>Email : {{ $contactOur->email }}</p>
        <p>Phone : {{ $contactOur->phone }}</p>
        <p>Subject : {{ $contactOur->subject }}</p>
        <p>Message : {{ $contactOur->message }}</p>
        <p>Read : {{ $contactOur->read_at }}</p>
    </div>
</div>
@endsection
