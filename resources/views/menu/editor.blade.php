@extends('admin')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-body">
            <h1>
                @if (is_null($menu))
                    Create Menu
                @else
                    Edit Menu
                @endif
            </h1><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($menu)) {{ route('menu.store') }} @else {{ url('menu/'.$menu->id) }} @endif" method="POST">
                        @if (!is_null($menu))
                            @method('PATCH')
                        @endif
                        @csrf
                        <div class="form-group">
                            <label>Name</label><br>
                            <input type="text" class="form-control" name="name" @if(!is_null($menu)) value="{{ $menu->name }}" @endif>
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
