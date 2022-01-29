@extends('admin')

@section('content')
<h1>Detail Content</h1>
<div class="content">
    <div class="card-body">
        <h5>Short Description</h5>
        {!! $service->short_description !!}
        <h5>Long Description</h5>
        {!! $service->long_description !!}
        {{-- @if (!is_null($content->images))
            <img src="{{ asset('storage/'.$content->images) }}" width="400" height="400" style="object-fit: contain;">
        @endif --}}
    </div>
</div>
@endsection
