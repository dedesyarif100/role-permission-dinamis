@extends('admin')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-body">
            <h1>
                @if (is_null($contactOur))
                    Create Contact Our
                @else
                    Edit Contact Our
                @endif
            </h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('contact-our/'.$contactOur->id) }}" method="POST">
                        @if (!is_null($contactOur))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" @if ( !empty($contactOur) ) value="{{ old('name', $contactOur->name) }}" @else value="{{ old('name') }}" @endif>
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
                                    <label for="">Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email" @if ( !empty($contactOur) ) value="{{ old('email', $contactOur->email) }}" @else value="{{ old('email') }}" @endif>
                                    @error('email')
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
                                    <label for="">Phone</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter phone" @if ( !empty($contactOur) ) value="{{ old('phone', $contactOur->phone) }}" @else value="{{ old('phone') }}" @endif>
                                    @error('phone')
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
                                    <label for="">Subject</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Enter subject" @if ( !empty($contactOur) ) value="{{ old('subject', $contactOur->subject) }}" @else value="{{ old('subject') }}" @endif>
                                    @error('subject')
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
                                    <label for="">Message</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="message" class="form-control" id="message" rows="10" cols="80">@if(!is_null($contactOur)){{ old('message', $contactOur->message) }}@else{{ old('message') }}@endif</textarea><br>
                                    @error('message')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
