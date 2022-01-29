@extends('admin')

@section('content')
<h1>Detail Content Slide Show</h1>
<div class="content">
    <div class="card-body">
        {!! $slideShow->description !!}
        {{-- @if (!is_null($slideShow->images))
            <img src="{{ asset('storage/'.$slideShow->images) }}" width="400" height="400" style="object-fit: contain;">
        @endif --}}
    </div>
</div>
@endsection
