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
                    <a href="{{ route('content.create') }}" class="btn btn-success btn-sm" style="width: 80px;">
                        <i class="fas fa-plus"></i> Create
                    </a>
                </div>
                <div class="col-md-10 align-self-end">
                    <h1>Content</h1>
                </div>
            </div><hr>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>Menu</th>
                        <th>Sub Menu</th>
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- BLADE  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> --}}
    {{-- Conditional Classes --}}
    @php
        $isActive = true;
        $status = 'oke';
        $conditionIsTrue = false;
        $conditionIsFalse = true;
        $jobs = [1, 2, 3, 4, 5, 6, 7, 8];
        $jobsIsNull = [1, 2, 3];
    @endphp

    <p @class([
        'text-white' => 1,
        'bg-primary' => 1
    ])>text-danger</p>

    {{-- Including Subviews --}}
    @include('content.include')<br>
    @include('content.include', [$status])<br>
    @includeIf('content.test', [$status])<br>
    @includeWhen($conditionIsTrue, 'view.name', [$status])<br>
    @includeUnless($conditionIsFalse, 'view.name', [$status])<br>
    @includeFirst(['content', 'content.include'], [$status])<br>

    {{-- Rendering Views For Collections --}}
    @each('content.job', $jobs, 'job')<br>
    @each('content.job', $jobsIsNull, 'job', 'content.include')

    {{-- The @once Directive --}}
    @once
        @push('js')
            <script>
                let i = 'nol';
                console.log(i);
            </script>
        @endpush
    @endonce

    {{-- Components --}}
    <x-input.text-field type="text" class="control" placeholder="form input" value="DEDE SYARIFUDIN" />
    <x-button-submit type="success" title="Button Submit" />
    {{-- <x-package-alert/> --}}
    {{-- <x-nightshade::calendar /> --}}
    @php
        $message = 'HELLO DEDE';
        // $slot = 'Submit Test';
        // $attribute = 'INI ATRIBUTE';
        // $alertType = 'test';
    @endphp
    {{-- Passing Data To Components --}}
    <x-alert type="error" :message="$message">
        <strong>Whoops!</strong> Something went wrong!
    </x-alert>
    --------------------------------------------------------------------------------------------------<br>
    {{-- <x-alert :alertType="$alertType"/> --}}

    {{-- Escaping Attribute Rendering --}}
    <x-button ::class="{ danger: isDeleting }">
        Submit
    </x-button>

    <button :class="{ danger: isDeleting }">
        Submit
    </button>
    {{-- <span class="p-4 text-gray-500 bg-red"></span> --}}

    {{-- Default / Merged Attributes --}}
    <x-alert type="error" :message="$message" class="mt-4">
        {{-- Slots --}}
        <x-slot name="judul">
            INI VARIABEL JUDUL
        </x-slot>
        <x-slot name="title">
            INI VARIABEL TITLE
            {{-- @dd($component) --}}
        </x-slot>
        <x-slot name="component1">
            {{ $component->formatAlert('Server Error') }}
        </x-slot>

        <strong>Whoops!</strong> Something went wrong!
    </x-alert>

    {{-- Slot Attributes --}}
    <x-card class="shadow-sm">
        <x-slot name="heading" class="font-bold">
            Heading
        </x-slot>

        Content

        <x-slot name="footer" class="text-sm">
            Footer
        </x-slot>
    </x-card>

    {{-- Accessing Parent Data --}}
    <x-menu color="red">
        <x-menu.item></x-menu.item>
    </x-menu>

    {{-- Dynamic Components --}}
    <x-dynamic-component :component="$messageComponent">
        Message
    </x-dynamic-component>

    <x-button>
        Submit
    </x-button>
    {{-- <x-alert type="error" :message="$message" class="mt-4"/> --}}
@endsection

@section('js')
<script>
    let table;
    let cell;
    let test = 'test 123';

    // var app = <?php echo json_encode($content); ?>;
    // var app = {{ Illuminate\Support\Js::from($content) }};
    var app = {{ Js::from($content) }};
    console.log(app);

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
                {data: 'menu', name: 'menu.name'},
                {data: 'sub_menu', name: 'sub_menu.name'},
                {data: 'slug', name: 'slug'},
                {data: 'title', name: 'title'},
                {data: 'sub_title', name: 'sub_title'},
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
            sendData.ajax = "{{ route('content.index') }}";
            table = $('#datatable').DataTable(sendData);
        }
        // SHOW ALL DATA >>>>>>>>>>>>>>>>>>

        // DELETE >>>>>>>>>>>>>>>>>>
        $(document).on('click', '#delete', function() {
            let contentId = $(this).data('id');
            swal.fire({
                title: 'Are you sure?',
                html: 'You want to <b>delete</b> this Content ',
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
                        url: "{{ url('admin/content') }}" + '/' + contentId,
                        data: {
                            contentId : contentId,
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
