@extends('admin')

@section('content')
    <h1>Menu</h1>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success btn-sm" id="create">Create</button><br><hr>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade modalMenu" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    let submitted = false;
    let process;
    let table;
    let cell;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
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
                {data: 'name', name: 'name'},
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
            sendData.ajax = "{{ route('menu.index') }}";
            table = $('#datatable').DataTable(sendData);
        }
        // SHOW ALL DATA >>>>>>>>>>>>>>>>>>

        // CREATE >>>>>>>>>>>>>>>>>>
        $(document).on('click', '#create', function() {
            $.get('{{ route("editor.menu") }}', function(data) {
                $('.modalMenu').find('.modal-content').html(data);
                $('.modalMenu').modal('show');
            });
        });
        $('.modalMenu').on('shown.bs.modal', function (event) {
            $('input[name="name"]').focus();
        });
        $('.modalMenu').on('hidden.bs.modal', function (event) {
            if (submitted) {
                submitted = false;
            }
        });
        // CREATE >>>>>>>>>>>>>>>>>>

        // EDIT >>>>>>>>>>>>>>>>>>
        $(document).on('click', '#edit', function() {
            let menuId = $(this).data('id');
            $.get('{{ route("editor.menu") }}', {menuId: menuId}, function(data) {
                $('.modalMenu').find('.modal-content').html(data);
                $('.modalMenu').modal('show');
            });
        });
        // EDIT >>>>>>>>>>>>>>>>>>

        // DELETE >>>>>>>>>>>>>>>>>>
        $(document).on('click', '#delete', function() {
            let menuId = $(this).data('id');
            swal.fire({
                title: 'Are you sure?',
                html: 'You want to <b>delete</b> this Menu ',
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
                        url: "{{ url('menu') }}" + '/' + menuId,
                        data: {
                            menuId : menuId,
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
