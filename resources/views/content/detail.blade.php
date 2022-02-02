@extends('admin')

@section('content')
<h1>Detail Content</h1><hr>
<div class="content">
    <div class="card-body">
        {!! $content->description !!}
        @if (!is_null($content->image))
            <img src="{{ asset('storage/'.$content->image) }}" width="400" height="400" style="object-fit: contain;">
        @endif
    </div>
</div>
@endsection
