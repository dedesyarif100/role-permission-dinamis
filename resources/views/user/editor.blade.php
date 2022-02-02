@extends('admin')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-body">
            <h1>
                @if (is_null($user))
                    Create user
                @else
                    Edit user
                @endif
            </h1><hr><br>
            {{-- Flash Message Laravel --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($user)) {{ route('user.store') }} @else {{ url('admin/user/'.$user->id) }} @endif" method="POST">
                        @if (!is_null($user))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Name : </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" @if ( !empty($user) ) value="{{ old('name', $user->name) }}" @else value="{{ old('name') }}" @endif>
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
                                    <label>Email : </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email" @if ( !empty($user) ) value="{{ old('email', $user->email) }}" @else value="{{ old('email') }}" @endif>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>

                        @if ( is_null($user) )
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Password : </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="input-group-append">
                                            <input type="password" class="input form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password" @if ( !empty($user) ) value="{{ old('password', $user->password) }}" @else value="{{ old('password') }}" @endif aria-label="password" aria-describedby="basic-addon1" >
                                            <span class="input-group-text" onclick="password_show_hide();" style="cursor: pointer;">
                                                <i class="fas fa-eye" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                            </span>
                                        </div>
                                        @error('password')
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
                                        <label>Password Confirmation : </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="input-group-append">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Enter password confirmation" @if ( !empty($user) ) value="{{ old('password', $user->password) }}" @else value="{{ old('password') }}" @endif>
                                            <span class="input-group-text" onclick="password_confirmation_show_hide();" style="cursor: pointer;">
                                                <i class="fas fa-eye" id="password_confirmation_show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="password_confirmation_hide_eye"></i>
                                            </span>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div><br>
                        @endif

                        @if ( !empty($user) )
                            @if ( auth()->user()->id !== $user->id )
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Role</label>
                                        </div>
                                        <div class="col-md-10">
                                            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="role_id">
                                                <option value="">- PILIH -</option>
                                                @foreach ($roles as $role)
                                                    @if (empty($user))
                                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : null }}>{{ $role->name }}</option>
                                                    @else
                                                        <option value="{{ $role->id }}" {{ old('role_id', $user->userRole->role_id) == $role->id ? 'selected' : null }}>{{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><br>
                            @endif
                        @else
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Role</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="role_id">
                                            <option value="">- PILIH -</option>
                                            @foreach ($roles as $role)
                                                @if (empty($user))
                                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : null }}>{{ $role->name }}</option>
                                                @else
                                                    <option value="{{ $role->id }}" {{ old('role_id', $user->userRole->role_id) == $role->id ? 'selected' : null }}>{{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div><br>
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
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_confirmation_show_hide() {
        var x = document.getElementById("password_confirmation");
        var show_eye = document.getElementById("password_confirmation_show_eye");
        var hide_eye = document.getElementById("password_confirmation_hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>
@endsection