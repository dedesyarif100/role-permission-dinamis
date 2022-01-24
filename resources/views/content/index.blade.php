@extends('admin')

@section('content')
    <h1>Content</h1>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success btn-sm" id="create">Create</button><br><hr>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>Menu</th>
                        <th>Sub Menu</th>
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Description</th>
                        <th>Images</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade modalContent" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    $(document).ready(function() {
        // SHOW ALL DATA >>>>>>>>>>>>>>>>>>
        let sendData = {
            processing  : true,
            serverSide  : true,
            scroolX     : true,
            autoWidth   : false,
            columns     : [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'menu', name: 'menu.name'},
                {data: 'sub_menu', name: 'sub_menu.name'},
                {data: 'slug', name: 'slug'},
                {data: 'title', name: 'title'},
                {data: 'sub_title', name: 'sub_title'},
                {data: 'description', name: 'description'},
                {data: 'images', name: 'images'},
                {
                    data: 'action',
                    name: 'action',
                    type: 'html',
                    orderable: false,
                    searchabe: false
                },
            ]
        });
        reload();

        function reload() {
            sendData.ajax = "{{ route('content.index') }}";
            table = $('#datatable').DataTable(sendData);
        }
        // SHOW ALL DATA >>>>>>>>>>>>>>>>>>

        // CREATE >>>>>>>>>>>>>>>>>>
        $(document).on('click', '#create', function() {
            $.get('{{ route("editor.content") }}', function(data) {
                $('.modalContent').find('.modal-content').html(data);
                $('.modalContent').show('modal');
            });
        });
        $('.modalContent').on('shown.bs.modal', function(event) {
            $('input[name="name"]').focus();
        });
        $('.modalContent').on('hidden.bs.modal', function(event) {
            if (submitted) {
                submitted = false;
            }
        });
        // CREATE >>>>>>>>>>>>>>>>>>

        // EDIT >>>>>>>>>>>>>>>>>>
        
        // EDIT >>>>>>>>>>>>>>>>>>

        // DELETE >>>>>>>>>>>>>>>>>>

        // DELETE >>>>>>>>>>>>>>>>>>
    });
</script>
@endsection
