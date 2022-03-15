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
                                        <input class="form-check-input" name="user_view" id="user_view" type="checkbox" @if(!is_null($role)) @if($role->permission->user_view) checked @endif @endif>
                                        <label class="form-check-label" for="user_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="user_create" id="user_create" type="checkbox" @if(!is_null($role)) @if($role->permission->user_create) checked @endif @endif>
                                        <label class="form-check-label" for="user_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="user_edit" id="user_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->user_edit) checked @endif @endif>
                                        <label class="form-check-label" for="user_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="user_delete" id="user_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->user_delete) checked @endif @endif>
                                        <label class="form-check-label" for="user_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Menu</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="menu_view" id="menu_view" type="checkbox" @if(!is_null($role)) @if($role->permission->menu_view) checked @endif @endif>
                                        <label class="form-check-label" for="menu_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="menu_create" id="menu_create" type="checkbox" @if(!is_null($role)) @if($role->permission->menu_create) checked @endif @endif>
                                        <label class="form-check-label" for="menu_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="menu_edit" id="menu_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->menu_edit) checked @endif @endif>
                                        <label class="form-check-label" for="menu_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="menu_delete" id="menu_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->menu_delete) checked @endif @endif>
                                        <label class="form-check-label" for="menu_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Sub Menu</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="submenu_view" id="submenu_view" type="checkbox" @if(!is_null($role)) @if($role->permission->submenu_view) checked @endif @endif>
                                        <label class="form-check-label" for="submenu_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="submenu_create" id="submenu_create" type="checkbox" @if(!is_null($role)) @if($role->permission->submenu_create) checked @endif @endif>
                                        <label class="form-check-label" for="submenu_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="submenu_edit" id="submenu_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->submenu_edit) checked @endif @endif>
                                        <label class="form-check-label" for="submenu_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="submenu_delete" id="submenu_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->submenu_delete) checked @endif @endif>
                                        <label class="form-check-label" for="submenu_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Content</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="content_view" id="content_view" type="checkbox" @if(!is_null($role)) @if($role->permission->content_view) checked @endif @endif>
                                        <label class="form-check-label" for="content_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="content_create" id="content_create" type="checkbox" @if(!is_null($role)) @if($role->permission->content_create) checked @endif @endif>
                                        <label class="form-check-label" for="content_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="content_edit" id="content_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->content_edit) checked @endif @endif>
                                        <label class="form-check-label" for="content_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="content_delete" id="content_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->content_delete) checked @endif @endif>
                                        <label class="form-check-label" for="content_delete">Can Delete</label>
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
                                        <input class="form-check-input" name="aboutus_view" id="aboutus_view" type="checkbox" @if(!is_null($role)) @if($role->permission->aboutus_view) checked @endif @endif>
                                        <label class="form-check-label" for="aboutus_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="aboutus_create" id="aboutus_create" type="checkbox" @if(!is_null($role)) @if($role->permission->aboutus_create) checked @endif @endif>
                                        <label class="form-check-label" for="aboutus_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="aboutus_edit" id="aboutus_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->aboutus_edit) checked @endif @endif>
                                        <label class="form-check-label" for="aboutus_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="aboutus_delete" id="aboutus_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->aboutus_delete) checked @endif @endif>
                                        <label class="form-check-label" for="aboutus_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Slide Show</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="slideshow_view" id="slideshow_view" type="checkbox" @if(!is_null($role)) @if($role->permission->slideshow_view) checked @endif @endif>
                                        <label class="form-check-label" for="slideshow_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="slideshow_create" id="slideshow_create" type="checkbox" @if(!is_null($role)) @if($role->permission->slideshow_create) checked @endif @endif>
                                        <label class="form-check-label" for="slideshow_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="slideshow_edit" id="slideshow_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->slideshow_edit) checked @endif @endif>
                                        <label class="form-check-label" for="slideshow_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="slideshow_delete" id="slideshow_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->slideshow_delete) checked @endif @endif>
                                        <label class="form-check-label" for="slideshow_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Service</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="service_view" id="service_view" type="checkbox" @if(!is_null($role)) @if($role->permission->service_view) checked @endif @endif>
                                        <label class="form-check-label" for="service_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="service_create" id="service_create" type="checkbox" @if(!is_null($role)) @if($role->permission->service_create) checked @endif @endif>
                                        <label class="form-check-label" for="service_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="service_edit" id="service_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->service_edit) checked @endif @endif>
                                        <label class="form-check-label" for="service_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="service_delete" id="service_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->service_delete) checked @endif @endif>
                                        <label class="form-check-label" for="service_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Trusted</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="trusted_view" id="trusted_view" type="checkbox" @if(!is_null($role)) @if($role->permission->trusted_view) checked @endif @endif>
                                        <label class="form-check-label" for="trusted_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="trusted_create" id="trusted_create" type="checkbox" @if(!is_null($role)) @if($role->permission->trusted_create) checked @endif @endif>
                                        <label class="form-check-label" for="trusted_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="trusted_edit" id="trusted_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->trusted_edit) checked @endif @endif>
                                        <label class="form-check-label" for="trusted_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="trusted_delete" id="trusted_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->trusted_delete) checked @endif @endif>
                                        <label class="form-check-label" for="trusted_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Comment Client</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="commentclient_view" id="commentclient_view" type="checkbox" @if(!is_null($role)) @if($role->permission->commentclient_view) checked @endif @endif>
                                        <label class="form-check-label" for="commentclient_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="commentclient_create" id="commentclient_create" type="checkbox" @if(!is_null($role)) @if($role->permission->commentclient_create) checked @endif @endif>
                                        <label class="form-check-label" for="commentclient_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="commentclient_edit" id="commentclient_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->commentclient_edit) checked @endif @endif>
                                        <label class="form-check-label" for="commentclient_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="commentclient_delete" id="commentclient_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->commentclient_delete) checked @endif @endif>
                                        <label class="form-check-label" for="commentclient_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Category News</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="categorynews_view" id="categorynews_view" type="checkbox" @if(!is_null($role)) @if($role->permission->categorynews_view) checked @endif @endif>
                                        <label class="form-check-label" for="categorynews_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="categorynews_create" id="categorynews_create" type="checkbox" @if(!is_null($role)) @if($role->permission->categorynews_create) checked @endif @endif>
                                        <label class="form-check-label" for="categorynews_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="categorynews_edit" id="categorynews_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->categorynews_edit) checked @endif @endif>
                                        <label class="form-check-label" for="categorynews_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="categorynews_delete" id="categorynews_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->categorynews_delete) checked @endif @endif>
                                        <label class="form-check-label" for="categorynews_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>News</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="news_view" id="news_view" type="checkbox" @if(!is_null($role)) @if($role->permission->news_view) checked @endif @endif>
                                        <label class="form-check-label" for="news_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="news_create" id="news_create" type="checkbox" @if(!is_null($role)) @if($role->permission->news_create) checked @endif @endif>
                                        <label class="form-check-label" for="news_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="news_edit" id="news_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->news_edit) checked @endif @endif>
                                        <label class="form-check-label" for="news_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="news_delete" id="news_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->news_delete) checked @endif @endif>
                                        <label class="form-check-label" for="news_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Faq</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="faq_view" id="faq_view" type="checkbox" @if(!is_null($role)) @if($role->permission->faq_view) checked @endif @endif>
                                        <label class="form-check-label" for="faq_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="faq_create" id="faq_create" type="checkbox" @if(!is_null($role)) @if($role->permission->faq_create) checked @endif @endif>
                                        <label class="form-check-label" for="faq_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="faq_edit" id="faq_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->faq_edit) checked @endif @endif>
                                        <label class="form-check-label" for="faq_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="faq_delete" id="faq_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->faq_delete) checked @endif @endif>
                                        <label class="form-check-label" for="faq_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Contact Us</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contactus_view" id="contactus_view" type="checkbox" @if(!is_null($role)) @if($role->permission->contactus_view) checked @endif @endif>
                                        <label class="form-check-label" for="contactus_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contactus_create" id="contactus_create" type="checkbox" @if(!is_null($role)) @if($role->permission->contactus_create) checked @endif @endif>
                                        <label class="form-check-label" for="contactus_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contactus_edit" id="contactus_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->contactus_edit) checked @endif @endif>
                                        <label class="form-check-label" for="contactus_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contactus_delete" id="contactus_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->contactus_delete) checked @endif @endif>
                                        <label class="form-check-label" for="contactus_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Information</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="information_view" id="information_view" type="checkbox" @if(!is_null($role)) @if($role->permission->information_view) checked @endif @endif>
                                        <label class="form-check-label" for="information_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="information_create" id="information_create" type="checkbox" @if(!is_null($role)) @if($role->permission->information_create) checked @endif @endif>
                                        <label class="form-check-label" for="information_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="information_edit" id="information_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->information_edit) checked @endif @endif>
                                        <label class="form-check-label" for="information_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="information_delete" id="information_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->information_delete) checked @endif @endif>
                                        <label class="form-check-label" for="information_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Consultation</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="consultation_view" id="consultation_view" type="checkbox" @if(!is_null($role)) @if($role->permission->consultation_view) checked @endif @endif>
                                        <label class="form-check-label" for="consultation_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="consultation_create" id="consultation_create" type="checkbox" @if(!is_null($role)) @if($role->permission->consultation_create) checked @endif @endif>
                                        <label class="form-check-label" for="consultation_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="consultation_edit" id="consultation_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->consultation_edit) checked @endif @endif>
                                        <label class="form-check-label" for="consultation_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="consultation_delete" id="consultation_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->consultation_delete) checked @endif @endif>
                                        <label class="form-check-label" for="consultation_delete">Can Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Contact Our</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contactour_view" id="contactour_view" type="checkbox" @if(!is_null($role)) @if($role->permission->contactour_view) checked @endif @endif>
                                        <label class="form-check-label" for="contactour_view">Can View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contactour_create" id="contactour_create" type="checkbox" @if(!is_null($role)) @if($role->permission->contactour_create) checked @endif @endif>
                                        <label class="form-check-label" for="contactour_create">Can Create</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contactour_edit" id="contactour_edit" type="checkbox" @if(!is_null($role)) @if($role->permission->contactour_edit) checked @endif @endif>
                                        <label class="form-check-label" for="contactour_edit">Can Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contactour_delete" id="contactour_delete" type="checkbox" @if(!is_null($role)) @if($role->permission->contactour_delete) checked @endif @endif>
                                        <label class="form-check-label" for="contactour_delete">Can Delete</label>
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

{{-- @section('js')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
<script>
    CKEDITOR.replace( 'description' );
    var upload = new FileUploadWithPreview("myUniqueUploadId");
</script>
@endsection --}}
