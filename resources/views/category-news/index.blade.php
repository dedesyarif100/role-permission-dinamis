@extends('admin')

@section('css')
<style>
    .dataTables_paginate, .dataTables_filter, .btn-group, .sorting_disabled {
        float: right;
    }
    a, button {
        margin: 3px;
    }
    .serial {
        float: left;
    }
    .dataTables_empty {
        text-align: center;
    }
</style>
@endsection

@section('content')
    {{-- Flash Message Laravel --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('category-news.create') }}" class="btn btn-success btn-sm" style="width: 80px;">
                        <i class="fas fa-plus"></i> Create
                    </a>
                </div>
                <div class="col-md-10 align-self-end">
                    <h1>Category News</h1>
                </div>
            </div><hr>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('js')
<script>
    let table;
    let cell;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // SHOW ALL DATA >>>>>>>>>>>>>>>>>>
        let sendData = {
            processing  : true,
            serverSide  : true,
            scroolX     : true,
            autoWidth   : false,
            columns     : [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'title', name: 'title'},
                {
                    data: 'action',
                    name: 'action',
                    type: 'html',
                    orderable: false,
                    searchabe: false
                },
            ]
        };
        reload();

        function reload() {
            sendData.ajax = "{{ route('category-news.index') }}";
            table = $('#datatable').DataTable(sendData);
        }
        // SHOW ALL DATA >>>>>>>>>>>>>>>>>>

        // DELETE >>>>>>>>>>>>>>>>>>
        $(document).on('click', '#delete', function() {
            let categoryNewsId = $(this).data('id');
            swal.fire({
                title: 'Are you sure?',
                html: 'You want to <b>delete</b> this Category News ',
                showCancelButton: true,
                showCloseButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#556ee6',
                confirmButtonColor: '#d33',
                width: 300,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('admin/category-news') }}" + '/' + categoryNewsId,
                        data: {
                            categoryNewsId : categoryNewsId,
                        },
                        success: function(data) {
                            toastr.success(data.msg);
                            cell = table.cell( this );
                            cell.data( cell.data() + 1 ).draw();
                        }
                    });
                }
            });
        });
        // DELETE >>>>>>>>>>>>>>>>>>
    });
</script>
@endsection
