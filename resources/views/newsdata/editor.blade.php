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
                @if (is_null($news))
                    Create News
                @else
                    Edit News
                @endif
            </h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($news)) {{ route('newsdata.store') }} @else {{ url('admin/newsdata/'.$news->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($news))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Category News</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="category_news_id" class="form-control @error('category_news_id') is-invalid @enderror" id="category_news_id">
                                        <option value="">- PILIH -</option>
                                        @foreach ($categoryNews as $item)
                                            @if (empty($news))
                                                <option value="{{ $item->id }}" {{ old('category_news_id') == $item->id ? 'selected' : null }}>{{ $item->title }}</option>
                                            @else
                                                <option value="{{ $item->id }}" {{ old('category_news_id', $news->category_news_id) == $item->id ? 'selected' : null }}>{{ $item->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category_news_id')
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
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" @if(!is_null($news)) value="{{ old('title', $news->title) }}" @else value="{{ old('title') }}" @endif>
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
                                    <label>Description</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10" cols="80">@if(!is_null($news)){{ old('description', $news->description) }}@else{{ old('description') }}@endif</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>

                        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="image">Upload File
                                        <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a>
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*" aria-label="Choose File"/>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control form-control @error('image') is-invalid @enderror"></span>
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </label>
                                    <div class="custom-file-container__image-preview" style="width: 400px; height: 300px; object-fit: contain;"></div>
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

@section('js')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
<script>
    CKEDITOR.replace( 'description' );
    var upload = new FileUploadWithPreview("myUniqueUploadId");
</script>
@endsection
