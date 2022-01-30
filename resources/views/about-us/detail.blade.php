@extends('admin')

@section('content')
<h1>Detail About Us</h1>
<div class="content">
    <div class="card-body">
        {!! $aboutUs->description !!}
        @if (!is_null($aboutUs->images))
            <img src="{{ asset('storage/'.$aboutUs->images) }}" width="400" height="400" style="object-fit: contain;">
        @endif
    </div>
</div>
@endsection
