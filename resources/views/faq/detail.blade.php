@extends('admin')

@section('content')
<h1>Detail Faq</h1><hr>
<div class="content">
    <div class="card-body">
        <span>{{ $faq->title }}</span>
        {!! $faq->description !!}
    </div>
</div>
@endsection
