@extends('admin')

@section('content')
<h1>Detail Comment Client</h1><hr>
<div class="content">
    <div class="card-body">
        @if (!is_null($commentClient->image))
            <img src="{{ asset('storage/'.$commentClient->image) }}" width="400" height="400" style="object-fit: contain;">
        @endif
        <h4>{{ $commentClient->name }}</h4>
        <h5>{{ $commentClient->title }}</h5>
        {{ $commentClient->message }}
    </div>
</div>
@endsection
