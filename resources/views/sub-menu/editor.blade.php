<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
        {{ empty($subMenu) ? 'Create Sub Menu' : 'Edit Sub Menu' }}
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    @if ( empty($subMenu) )
        <form action="{{ route('sub-menu.store') }}" method="post" id="editor-submenu-form">
    @else
        <form action="{{ url('sub-menu/'.$subMenu->id) }}" method="post" id="editor-submenu-form">
        @method('PATCH')
    @endif
        @csrf
            <div class="form-group">
                <label for="">Menu</label>
                <select name="menu_id" class="form-control" id="menu_id">
                    <option value="">- PILIH -</option>
                    @foreach ($allMenu as $item)
                        @if (empty($subMenu))
                            <option value="{{ $item->id }}" {{ old('menu_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}" {{ old('menu_id', $subMenu->menu_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                <span class="text-danger error-text menu_id_error"></span>
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" @if ( !empty($subMenu) ) value="{{ $subMenu->name }}" @endif>
                <span class="text-danger error-text name_error"></span>
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-block btn-success">
                    <span class="submit" role="status" aria-hidden="true"></span> Save Changes
                </button>
            </div>
        </form>
</div>
<script>
    $(function() {
        $('#editor-submenu-form').on('submit', function(event) {
            event.preventDefault();
            let form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(data) {
                    if(data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    } else {
                        $('.modalSubMenu').modal('hide');
                        $('.modalSubMenu').find('form')[0].reset();
                        toastr.success(data.msg);
                        submitted = true;
                        cell = table.cell( this );
                        cell.data( cell.data() + 1 ).draw();
                    }
                }
            });
        });
    });
</script>
