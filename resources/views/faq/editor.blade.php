@extends('admin')

@section('css')
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
                @if (is_null($faq))
                    Create Faq
                @else
                    Edit Faq
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($faq)) {{ route('faq.store') }} @else {{ url('faq/'.$faq->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($faq))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <label>Title</label><br>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" @if(!is_null($faq)) value="{{ old('title', $faq->title) }}" @else value="{{ old('title') }}" @endif>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Description</label><br>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10" cols="80">@if(!is_null($faq)) {{ old('description', $faq->description) }} @else {{ old('description') }} @endif</textarea>
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
