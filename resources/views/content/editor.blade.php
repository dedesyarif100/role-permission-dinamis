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
                @if (is_null($content))
                    Create Content
                @else
                    Edit Content
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($content)) {{ route('content.store') }} @else {{ url('content/'.$content->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($content))
                            @method('PATCH')
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="">Menu</label>
                            <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror" id="menu_id">
                                <option value="">- PILIH -</option>
                                @foreach ($allMenu as $item)
                                    @if (empty($content))
                                        <option value="{{ $item->id }}" {{ old('menu_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}" {{ old('menu_id', $content->menu_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('menu_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="">Sub Menu</label>
                            <select name="sub_menu_id" class="form-control @error('sub_menu_id') is-invalid @enderror" id="sub_menu_id">
                                <option value="">- PILIH -</option>
                                @foreach ($allSubMenu as $item)
                                    @if (empty($content))
                                        <option value="{{ $item->id }}" {{ old('sub_menu_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}" {{ old('sub_menu_id', $content->sub_menu_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('sub_menu_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label>Title</label><br>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" @if(!is_null($content)) value="{{ old('title', $content->title) }}" @else value="{{ old('title') }}" @endif>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label>Sub Title</label><br>
                            <input type="text" class="form-control" name="sub_title" @if(!is_null($content)) value="{{ old('sub_title', $content->sub_title) }}" @else value="{{ old('sub_title') }}" @endif>
                        </div><br>
                        <div class="form-group">
                            <label>Description</label><br>
                            <textarea name="description" id="description" rows="10" cols="80">@if(!is_null($content)){{ old('description', $content->description) }}@else{{ old('description') }}@endif</textarea><br>
                        </div><br>
                        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                            <label for="image">Upload File
                                <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a>
                            </label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*" aria-label="Choose File"/>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
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
