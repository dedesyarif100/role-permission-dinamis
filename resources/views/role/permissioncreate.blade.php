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
{{-- @dd($permission[0]->permission) --}}
<input type="hidden" id="role" name="role_id" value="{{ $role->id }}">
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-body">
            <h1>Create Permission</h1><hr><br>
            <div class="row">
                <div class="col-md-12">
                    <form action="@if(is_null($permission)) {{ route('permission.store') }} @endif" method="POST" enctype="multipart/form-data">
                        @if (!is_null($permission))
                            @method('PATCH')
                        @endif
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Permission Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
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
            <h1>Role Name : {{ $role->name }}</h1>

            <div class="demo-container">
                <div id="gridContainer"></div>
                <div class="options">
                    <div class="caption">Options</div>
                    <div class="option">
                        <div id="autoExpand"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade modalPermission" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function() {
        let roleid = $('#role').val();
        const dataGrid = $('#gridContainer').dxDataGrid({
            dataSource: "{{ url('admin/permission/') }}" + '/' + roleid,
            keyExpr: 'ID',
            allowColumnReordering: true,
            showBorders: true,
            grouping: {
                autoExpandAll: true,
            },
            searchPanel: {
            visible: true,
            },
            paging: {
                pageSize: 10,
            },
            groupPanel: {
                visible: true,
            },
            columns: [
                {
                    dataField: 'DT_RowIndex',
                    dataType: 'number',
                    orderable: false,
                    searchable: false,
                    width: 60,
                },
                {
                    dataField: 'permission',
                    dataType: 'string'
                },
                {
                    dataField: 'action',
                    type: 'html',
                    allowFiltering: false,
                    allowGrouping: false
                }
            ],
        }).dxDataGrid('instance');

        // $('#autoExpand').dxCheckBox({
        //     value: true,
        //     text: 'Expand All Groups',
        //     onValueChanged(data) {
        //         dataGrid.option('grouping.autoExpandAll', data.value);
        //     },
        // });

        // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Edit Data >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        $(document).on('click', '#edit', function () {
            let permissionId = $(this).data('id');
            $('.modalPermission').find('span.error-text').text('');
            $.get('{{ route("permission.edit") }}', {permissionId: permissionId}, function (data) {
                $('.modalPermission').find('.modal-content').html(data);
                $('.modalPermission').modal('show');
            });
        });

        $('.modalPermission').on('shown.bs.modal', function (event) {
            $('#name"]').focus();
        });

        $('.modalPermission').on('hidden.bs.modal', function (event) {
            if (submitted) {
                prosesDesktop();
                submitted = false;
            }
        });

        $(document).on('click', '#getRoleName', function () {
            let permissionName = $(this).data('name');
            $('.modalPermission').find('span.error-text').text('');
            $.get('{{ route("permission.name") }}', {permissionName: permissionName}, function (data) {
                $('.modalPermission').find('.modal-content').html(data);
                $('.modalPermission').modal('show');
            });
        });
        // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Edit Data >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    });
</script>
@endsection
