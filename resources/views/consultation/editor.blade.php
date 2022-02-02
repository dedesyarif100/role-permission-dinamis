@extends('admin')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-body">
            <h1>
                @if (is_null($consultations))
                    Create Consultation
                @else
                    Edit Consultation
                @endif
            </h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('admin/consultations/'.$consultations->id) }}" method="POST">
                        @if (!is_null($consultations))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" @if ( !empty($consultations) ) value="{{ old('name', $consultations->name) }}" @else value="{{ old('name') }}" @endif>
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
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email" @if ( !empty($consultations) ) value="{{ old('email', $consultations->email) }}" @else value="{{ old('email') }}" @endif>
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
                                    <label for="">Company</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" placeholder="Enter company" @if ( !empty($consultations) ) value="{{ old('company', $consultations->company) }}" @else value="{{ old('company') }}" @endif>
                                    @error('company')
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
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter phone" @if ( !empty($consultations) ) value="{{ old('phone', $consultations->phone) }}" @else value="{{ old('phone') }}" @endif>
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
                                    <label for="">Message</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="message" class="form-control" id="message" rows="10" cols="80">@if(!is_null($consultations)){{ old('message', $consultations->message) }}@else{{ old('message') }}@endif</textarea><br>
                                    @error('message')
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
                                    <label for="">Consultation Type</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('consultation_type') is-invalid @enderror" name="consultation_type" placeholder="Enter consultation_type" @if ( !empty($consultations) ) value="{{ old('consultation_type', $consultations->consultation_type) }}" @else value="{{ old('consultation_type') }}" @endif>
                                    @error('consultation_type')
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
