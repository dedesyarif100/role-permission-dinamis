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
                @if (is_null($slideShow))
                    Create Slide Show
                @else
                    Edit Slide Show
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($slideShow)) {{ route('slide-show.store') }} @else {{ url('slide-show/'.$slideShow->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($slideShow))
                            @method('PATCH')
                        @endif
                        @csrf
                        <div class="form-group">
                            <label>Description</label><br>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10" cols="80">@if(!is_null($slideShow)){{ old('description', $slideShow->description) }}@else{{ old('description') }}@endif</textarea>
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
                        @if (!is_null($slideShow))
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="is_active" name="is_active" type="checkbox" id="flexSwitchCheckChecked" @if($slideShow->is_active != 0) checked @endif>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                            </div>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
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
    // CKEDITOR.replace( 'description' );
    let upload = new FileUploadWithPreview("myUniqueUploadId");
    $(function() {
        $(document).on('change', '#is_active', function() {
            console.log( $('#is_active').val() );
        });
    });
</script>
@endsection
