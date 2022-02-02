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
            <h1>Edit About Us</h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('admin/about-us/'.$aboutUs->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Title</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $aboutUs->title) }}">
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
                                    <label>Whatshapp Number</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" value="{{ old('whatsapp_number', $aboutUs->whatsapp_number) }}">
                                    @error('whatsapp_number')
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
                                    <label>Instagram</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram', $aboutUs->instagram) }}">
                                    @error('instagram')
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
                                    <label>Linked In</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ old('linkedin', $aboutUs->linkedin) }}">
                                    @error('linkedin')
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
                                    <label>Facebook</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook', $aboutUs->facebook) }}">
                                    @error('facebook')
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
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10" cols="80">{{ old('description', $aboutUs->description) }}</textarea>
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
    let upload = new FileUploadWithPreview("myUniqueUploadId");
</script>
@endsection
