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
                @if (is_null($information))
                    Create Information
                @else
                    Edit Information
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($information)) {{ route('information.store') }} @else {{ url('information/'.$information->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($information))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <label>Description</label><br>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10" cols="80">@if(!is_null($information)){{ old('information->description', $information->description) }}@else{{ old('description') }}@endif</textarea>
                            @error('description')
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
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection
