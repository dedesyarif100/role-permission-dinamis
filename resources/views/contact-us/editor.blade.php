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
                @if (is_null($contactUs))
                    Create Contact Us
                @else
                    Edit Contact Us
                @endif
            </h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($contactUs)) {{ route('contact-us.store') }} @else {{ url('admin/contact-us/'.$contactUs->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($contactUs))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Icon</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" @if(!is_null($contactUs)) value="{{ old('icon', $contactUs->icon) }}" @else value="{{ old('icon') }}" @endif>
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Title</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" @if(!is_null($contactUs)) value="{{ old('title', $contactUs->title) }}" @else value="{{ old('title') }}" @endif>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Sub Title</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" @if(!is_null($contactUs)) value="{{ old('sub_title', $contactUs->sub_title) }}" @else value="{{ old('sub_title') }}" @endif>
                                    @error('sub_title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10" cols="80">@if(!is_null($contactUs)){{ old('description', $contactUs->description) }}@else{{ old('description') }}@endif</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Link</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" @if(!is_null($contactUs)) value="{{ old('link', $contactUs->link) }}" @else value="{{ old('link') }}" @endif>
                                    @error('link')
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
