@extends('admin')

@section('content')
<h1>Detail Content Slide Show</h1>
<div class="content">
    <div class="card-body">
        {!! $slideShow->description !!}
        <img src="{{ asset('storage/'.$slideShow->image) }}" width="400" height="400" style="object-fit: contain;">
    </div>
</div>
@endsection
