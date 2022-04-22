@extends('admin')

@section('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"/>
<style>
    .custom-file-container__image-preview {
        overflow: hidden;
    }
    .form-check-input, label {
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-body">
            <h1>
                @if (is_null($role))
                    Create Role
                @else
                    Edit Role
                @endif
            </h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($role)) {{ route('role.store') }} @else {{ url('admin/role/'.$role->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($role))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Role Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" @if(!is_null($role)) value="{{ old('name', $role->name) }}" @else value="{{ old('name') }}" @endif>
                                    @error('name')
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
                                    <label>User</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="user_view" id="user_view" type="checkbox">
                                        <label class="form-check-label" for="user_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="user_create" id="user_create" type="checkbox">
                                        <label class="form-check-label" for="user_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="user_edit" id="user_edit" type="checkbox">
                                        <label class="form-check-label" for="user_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="user_delete" id="user_delete" type="checkbox">
                                        <label class="form-check-label" for="user_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>About Us</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="aboutus_view" id="aboutus_view" type="checkbox">
                                        <label class="form-check-label" for="aboutus_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="aboutus_create" id="aboutus_create" type="checkbox">
                                        <label class="form-check-label" for="aboutus_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="aboutus_edit" id="aboutus_edit" type="checkbox">
                                        <label class="form-check-label" for="aboutus_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="aboutus_delete" id="aboutus_delete" type="checkbox">
                                        <label class="form-check-label" for="aboutus_delete">Can Delete</label>
                                    </div>
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
