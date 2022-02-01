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
                @if (is_null($contactUs))
                    Create Contact Us
                @else
                    Edit Contact Us
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($contactUs)) {{ route('contact-us.store') }} @else {{ url('contact-us/'.$contactUs->id) }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($contactUs))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <label>Email</label><br>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" @if(!is_null($contactUs)) value="{{ old('email', $contactUs->email) }}" @else value="{{ old('email') }}" @endif>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Phone Number</label><br>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" @if(!is_null($contactUs)) value="{{ old('phone_number', $contactUs->phone_number) }}" @else value="{{ old('phone_number') }}" @endif>
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Address</label><br>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="10" cols="80">@if(!is_null($contactUs)){{ old('address', $contactUs->address) }}@else{{ old('address') }}@endif</textarea>
                            @error('address')
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