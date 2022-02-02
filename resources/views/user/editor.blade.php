@extends('admin')

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
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" @if ( !empty($user) ) value="{{ old('password', $user->password) }}" @else value="{{ old('password') }}" @endif>
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
                                        <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter password confirmation" @if ( !empty($user) ) value="{{ old('password', $user->password) }}" @else value="{{ old('password') }}" @endif>
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
