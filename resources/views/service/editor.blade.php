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
                @if (is_null($service))
                    Create Service
                @else
                    Edit Service
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($service)) {{ route('service.store') }} @else {{ url('service/'.$service->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($service))
                            @method('PATCH')
                        @endif
                        @csrf
                        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                            <label for="image">Images
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
                            <label>Title</label><br>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" @if(!is_null($service)) value="{{ $service->title }}" @endif>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Short Description</label><br>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="short_description" rows="10" cols="80">@if(!is_null($service)) {{ $service->short_description }}@endif</textarea><br>
                            @error('short_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Long Description</label><br>
                            <textarea name="long_description" class="form-control @error('long_description') is-invalid @enderror" id="long_description" rows="10" cols="80">@if(!is_null($service)) {{ $service->long_description }}@endif</textarea><br>
                            @error('long_description')
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
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
<script>
    CKEDITOR.replace( 'short_description' );
    CKEDITOR.replace( 'long_description' );
    let upload = new FileUploadWithPreview("myUniqueUploadId");
    $(function() {
        $(document).on('change', '#is_active', function() {
            console.log( $('#is_active').val() );
        });
    });
</script>
@endsection
