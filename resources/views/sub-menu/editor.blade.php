@extends('admin')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-body">
            <h1>
                @if (is_null($subMenu))
                    Create Sub Menu
                @else
                    Edit Sub Menu
                @endif
            </h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($subMenu)) {{ route('sub-menu.store') }} @else {{ url('sub-menu/'.$subMenu->id) }} @endif" method="POST">
                        @if (!is_null($subMenu))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Menu</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror" id="menu_id">
                                        <option value="">- PILIH -</option>
                                        @foreach ($allMenu as $item)
                                            @if (empty($subMenu))
                                                <option value="{{ $item->id }}" {{ old('menu_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}" {{ old('menu_id', $subMenu->menu_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('menu_id')
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
                                    <label for="">Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" @if ( !empty($subMenu) ) value="{{ old('name', $subMenu->name) }}" @else value="{{ old('name') }}" @endif>
                                    @error('name')
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
