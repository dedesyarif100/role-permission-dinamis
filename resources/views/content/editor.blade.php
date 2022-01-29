@extends('admin')

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
                    <form action="@if(is_null($content)) {{ route('content.store') }} @else {{ url('content/'.$content->id) }} @endif" method="POST">
                        @if (!is_null($content))
                            @method('PATCH')
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="">Menu</label>
                            <select name="menu_id" class="form-control" id="menu_id">
                                <option value="">- PILIH -</option>
                                @foreach ($allMenu as $item)
                                    @if (empty($content))
                                        <option value="{{ $item->id }}" {{ old('menu_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}" {{ old('menu_id', $content->menu_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger error-text menu_id_error"></span>
                        </div><br>
                        <div class="form-group">
                            <label for="">Sub Menu</label>
                            <select name="sub_menu_id" class="form-control" id="sub_menu_id">
                                <option value="">- PILIH -</option>
                                @foreach ($allSubMenu as $item)
                                    @if (empty($content))
                                        <option value="{{ $item->id }}" {{ old('sub_menu_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}" {{ old('sub_menu_id', $content->sub_menu_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger error-text sub_menu_id_error"></span>
                        </div><br>
                        <div class="form-group">
                            <label>Title</label><br>
                            <input type="text" class="form-control" name="title" @if(!is_null($content)) value="{{ $content->title }}" @endif>
                        </div><br>
                        <div class="form-group">
                            <label>Sub Title</label><br>
                            <input type="text" class="form-control" name="sub_title" @if(!is_null($content)) value="{{ $content->sub_title }}" @endif>
                        </div><br>
                        <textarea name="description" id="editor1" rows="10" cols="80">@if(!is_null($content)) {{ $content->description }}@endif</textarea><br>
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
    CKEDITOR.replace( 'editor1' );
</script>
@endsection
