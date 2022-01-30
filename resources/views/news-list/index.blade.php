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

    <h1>News</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('news-list.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Create
            </a>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>Category News</th>
                        {{-- <th>User</th> --}}
                        <th>Title</th>
                        <th>Description</th>
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
                {data: 'categoryNews', name: 'categoryNews.title'},
                // {data: 'user', name: 'user.name'},
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
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
            sendData.ajax = "{{ route('news-list.index') }}";
            table = $('#datatable').DataTable(sendData);
        }
        // SHOW ALL DATA >>>>>>>>>>>>>>>>>>

        // DELETE >>>>>>>>>>>>>>>>>>
        $(document).on('click', '#delete', function() {
            let newsId = $(this).data('id');
            swal.fire({
                title: 'Are you sure?',
                html: 'You want to <b>delete</b> this News ',
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
                        url: "{{ url('news-list') }}" + '/' + newsId,
                        data: {
                            newsId : newsId,
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
