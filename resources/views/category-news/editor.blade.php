@extends('admin')

@section('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"/>
<style>
    .custom-file-container__image-preview {
        overflow: hidden;
    }
</style>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-body">
            <h1>
                @if (is_null($categoryNews))
                    Create Category News
                @else
                    Edit Category News
                @endif
            </h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($categoryNews)) {{ route('category-news.store') }} @else {{ url('admin/category-news/'.$categoryNews->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($categoryNews))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Title</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" @if(!is_null($categoryNews)) value="{{ $categoryNews->title }}" @endif>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" id="submit" class="btn btn-block btn-success">
                                <span class="submit" role="status" aria-hidden="true"></span> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

