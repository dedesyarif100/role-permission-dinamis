@extends('admin')

@section('content')
<h1>Detail News</h1>
<div class="content">
    <div class="card-body">
        <h2>{{ $news->categoryNews->title }}</h2>
        <h3>{{ $news->title }}</h3>
        <p>{!! $news->description !!}</p>
        @if (!is_null($news->image))
            <img src="{{ asset('storage/'.$news->image) }}" width="400" height="400" style="object-fit: contain;">
        @endif
    </div>
</div>
@endsection
