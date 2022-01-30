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
                @if (is_null($aboutUs))
                    Create About Us
                @else
                    Edit About Us
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($aboutUs)) {{ route('about-us.store') }} @else {{ url('about-us/'.$aboutUs->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($aboutUs))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <label>Title</label><br>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" @if(!is_null($aboutUs)) value="{{ old('title', $aboutUs->title) }}" @else value="{{ old('title') }}" @endif>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Whatshapp Number</label><br>
                            <input type="text" class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" @if(!is_null($aboutUs)) value="{{ old('whatsapp_number', $aboutUs->whatsapp_number) }}" @else value="{{ old('whatsapp_number') }}" @endif>
                            @error('whatsapp_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Instagram</label><br>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" @if(!is_null($aboutUs)) value="{{ old('instagram', $aboutUs->instagram) }}" @else value="{{ old('instagram') }}" @endif>
                            @error('instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Linked In</label><br>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" @if(!is_null($aboutUs)) value="{{ old('linkedin', $aboutUs->linkedin) }}" @else value="{{ old('linkedin') }}" @endif>
                            @error('linkedin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Facebook</label><br>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" @if(!is_null($aboutUs)) value="{{ old('facebook', $aboutUs->facebook) }}" @else value="{{ old('facebook') }}" @endif>
                            @error('facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Description</label><br>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10" cols="80">@if(!is_null($aboutUs)) {{ old('description', $aboutUs->description) }} @else {{ old('description') }} @endif</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                            <label for="image">Upload File
                                <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a>
                            </label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="image" @if(!is_null($aboutUs)) value="{{ old('image', $aboutUs->image) }}" @endif class="custom-file-container__custom-file__custom-file-input" accept="image/*" aria-label="Choose File"/>
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
