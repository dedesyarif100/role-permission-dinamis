@extends('admin')

@section('content')
<h1>Consultation</h1><hr>
<div class="content">
    <div class="card-body">
        <p>Name : {{ $consultations->name }}</p>
        <p>Email : {{ $consultations->email }}</p>
        <p>Company : {{ $consultations->company }}</p>
        <p>Phone : {{ $consultations->phone }}</p>
        <p>Message : {{ $consultations->message }}</p>
        <p>Consultation Type : {{ $consultations->consultation_type }}</p>
        <p>Read : {{ $consultations->read_at }}</p>
    </div>
</div>
@endsection
