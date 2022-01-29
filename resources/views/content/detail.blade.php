@extends('admin')

@section('content')
<h1>Detail Content</h1>
<div class="content">
    <div class="card-body">
        {!! $content->description !!}
        @if (!is_null($content->images))
            <img src="{{ asset('storage/'.$content->images) }}" width="400" height="400" style="object-fit: contain;">
        @endif
    </div>
</div>
@endsection
