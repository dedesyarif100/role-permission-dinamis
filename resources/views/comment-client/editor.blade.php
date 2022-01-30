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
                @if (is_null($commentClient))
                    Create Comment Client
                @else
                    Edit Comment Client
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($commentClient)) {{ route('comment-client.store') }} @else {{ url('comment-client/'.$commentClient->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($commentClient))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                            <label for="image">Upload File
                                <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a>
                            </label>
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

                        <div class="form-group">
                            <label>Name</label><br>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" @if(!is_null($commentClient)) value="{{ old('name', $commentClient->name) }}" @else value="{{ old('name') }}" @endif>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Title</label><br>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" @if(!is_null($commentClient)) value="{{ old('title', $commentClient->title) }}" @else value="{{ old('title') }}" @endif>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Message</label><br>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="10" cols="80">@if(!is_null($commentClient)){{ old('message', $commentClient->message) }}@else{{ old('message') }}@endif</textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
{{-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> --}}
<script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
<script>
    // CKEDITOR.replace( 'description' );
    var upload = new FileUploadWithPreview("myUniqueUploadId");
</script>
@endsection
