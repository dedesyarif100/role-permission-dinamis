@extends('admin')

@section('content')
<h1>Detail Content</h1>
<div class="content">
    <div class="card-body">
        {!! $content->description !!}
        {{ $content->images }}
    </div>
</div>
@endsection
