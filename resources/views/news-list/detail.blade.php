@extends('admin')

@section('content')
<h1>Detail News</h1>
<div class="content">
    <div class="card-body">
        {{ $news->categoryNews->title ?? '' }}
        {{ $news->description }}
        @if (!is_null($news->image))
            <img src="{{ asset('storage/'.$news->image) }}" width="400" height="400" style="object-fit: contain;">
        @endif
    </div>
</div>
@endsection
